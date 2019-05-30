<?php

namespace App\Http\Controllers\Web;

use App\Exam;
use App\Client;
use App\Receipt;
use App\ExamType;
use App\Medicine;
use App\Appointment;
use App\Collaborator;
use App\AppointmentExam;
use App\AppointmentReceipt;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;

class AppointmentController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /**
     * Show all users.
     *  @return JsonResponse
     */
    public function index(Request $request)
    {
        return new JsonResponse(Appointment::all());
    }
    /**
     * 
     */
    public function show(Appointment $appointment)
    {
        return view('appointment.show')->with('appointment',$appointment);
    }
    /**
     * function used to create appointments through AJAX Requests from modal_create at fullcalendar.
     *
     * @param Request $request
     * @return void
     */
    public function create(Request $request)
    {

    }
    public function nextAppointments(Request $request)
    {        
        $this->authorize('seeNextAppointments', Appointment::class);
        
        return view('appointment.next_appointments')
        ->with('appointments',Appointment::orderBy('start')->get()); 
    }

    public function edit(Request $request, $id)
    {
        return ;
    }
    public function destroy(Request $request, $id)
    {
        return ;
    }
    /**
     * Show appointments by it's client_id.
     *  @return JsonResponse
     */
    public function showByClientId($client_id)
    {
        return new JsonResponse(Appointment::where('client_id',$client_id)->get());
    }
    /**
     * Show appointments by it's collaborator_id.
     *  @return JsonResponse
     */
    public function showByCollaboratorId($collaborator_id)
    {
        return new JsonResponse(Appointment::where('collaborator_id',$collaborator_id)->get());
    }
    
    /**
     * Inicia uma consulta por parte do médico
     *
     * @param Request $request
     * @param [type] $id
     * @return void
     */
    public function attendTo(Request $request, Appointment $appointment)
    {
        return view('appointment.attend_to')
        ->with('appointment', $appointment); 
    }
    /**
     * Method responsible for store an appointment by the doctor.
     *
     * @return void
     */
    public function addDescription(Request $request, Appointment $appointment)
    {
        if($request->description){
            $appointment->note = $appointment->note . "\n---------\n" . $request->description;
            $appointment->save();
        }   
        return redirect()->route('appointment.needExams',$appointment->id);
    }
    /**
     * Method responsible for store an appointment by the doctor.
     *
     * @return void
     */
    public function attachExam(Request $request, Appointment $appointment)
    {
        return view('exam.form')
        ->with('client', $appointment->client)
        ->with('appointment', $appointment)
        ->with('examTypes', ExamType::all())
        ->with('flag_redirect',1);
    }
    public function storeExam(Request $request,Appointment $appointment)
    {
        $exam = Exam::create([
            'client_id' => $request->client_id,
            'collaborator_id' => $request->collaborator_id,
            'exam_type_id' => $request->exam_type_id,
            'note' => $request->note,
        ]);
        AppointmentExam::create([
            'appointment_id' => $appointment->id,
            'exam_id' => $exam->id,
        ]);
        return redirect()->route('appointment.needExams', $appointment->id)->with('status', 'Exame adicionado como sucesso!');
    }
    public function destroyExam(Appointment $appointment, Exam $exam)
    {
        if(isset($exam->result)){
            $exam->result()->delete();
        }
        if($exam->appointments){
            AppointmentExam::where('appointment_id', $appointment->id)->where('exam_id',$exam->id)->delete();
        }
        $exam->delete();
        $exam->deleted = true;

        return redirect()->route('appointment.needExams', $appointment->id)->with('status', 'Exame deletado como sucesso!');
    }
    public function needExams(Appointment $appointment)
    {
        return view('appointment.need_exams')
        ->with('appointment',$appointment)
        ->with('exam_types', ExamType::all());
    }
    public function needReceipts(Request $request, Appointment $appointment)
    {
        
        return view('appointment.need_receipts')->with('appointment',$appointment);
    }
    public function attachReceipt(Request $request, Appointment $appointment)
    {
        return view('receipt.form')
        ->with('client', $appointment->client)
        ->with('appointment', $appointment)
        ->with('medicines', Medicine::all('id', 'generic_name'))
        ->with('flag_redirect',1);
        
        
    }
    public function storeReceipt(Request $request,Appointment $appointment)
    {
        $receipt = Receipt::create([
            'client_id' => $request->client_id,
            'collaborator_id' => $request->collaborator_id,
        ]);
        AppointmentReceipt::create([
            'appointment_id' => $appointment->id,
            'receipt_id' => $receipt->id,
        ]);
        return redirect()->route('appointment.needReceipt', $appointment->id)->with('status', 'Receita adicionada como sucesso!');
    }
    public function destroyReceipt(Appointment $appointment, Receipt $receipt)
    {
        if($receipt->appointments){
            AppointmentReceipt::where('appointment_id', $appointment->id)->where('receipt_id',$receipt->id)->delete();
        }
        $receipt->delete();
        $receipt->deleted = true;

        return redirect()->route('appointment.needReceipt', $appointment->id)->with('status', 'Receita deletada como sucesso!');
    }
    public function showReceipt(Appointment $appointment, Receipt $receipt){
        return view('receipt.show')
        ->with('appointment',$appointment)
        ->with('receipt', $receipt)
        ->with('clients', Client::all())
        ->with('medicines', Medicine::all())
        ->with('collaborators',Collaborator::all())
        ->with('flag_redirect',1);
    }
    public function endAppointment(Appointment $appointment){
        $appointment->is_done = true;
        return redirect()->route('client.show', $appointment->client->id)->with('status', 'Consulta realizada com sucesso');
    }
    public function searchByName(Request $request)
    {
        
        if(!$request->name){
            $appointments = Appointment::all();
            return redirect()->route('appointment.next_appointments', compact('appointments'))->with('status-info','Preencha o campo de busca para efetuar uma pesquisa.');
        }
        $client = Client::where('name','LIKE', "%{$request->name}%")->first();
        if(!$client){
            $appointments = Appointment::all();
            return redirect()->route('appointment.next_appointments', compact('appointments'))->with('status-info','Paciente não encontrado.');
        }
        $appointments = Appointment::where('client_id',$client->id)->get();
        return view('appointment.next_appointments_filtered', compact('appointments'));        
    }
}
