<?php

namespace App\Http\Controllers\Web;

use App\Appointment;
use App\Client;
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
    public function attendTo(Request $request, $id)
    {
        return view('appointment.attend_to')
        ->with('appointment', Appointment::find($id)); 
    }
    /**
     * Method responsible for store an appointment by the doctor.
     *
     * @return void
     */
    public function store(Request $request, $id)
    {
        $appointment = Appointment::find($id);
        $appointment->note = $appointment->note . "\n---------\n" . $request->description;
        $appointment->save();
        return redirect()->route('appointment.need_exams', $appointment->id)->with('status', 'Paciente adicionado com sucesso!');
    }
    /**
     * Method responsible for store an appointment by the doctor.
     *
     * @return void
     */
    public function attachExams(Request $request, $id)
    {
        $this->authorize('seeNextAppointments', Appointment::class);
        $appointment = Appointment::find($id);
        dd($appointment);
        return redirect()->route('appointment.need_exams', $appointment->id)->with('status', 'Paciente adicionado com sucesso!');
    }
    public function needExams(Request $request, $id)
    {
        $this->authorize('seeNextAppointments', Appointment::class);
        $appointment = Appointment::find($id);
        return view('appointment.need_exams', compact('appointment'));
    }
    public function needReceipts(Request $request, $id)
    {
        $this->authorize('seeNextAppointments', Appointment::class);
        return view('appointment.need_receipts');
    }
    public function searchByName(Request $request)
    {
        $this->authorize('seeNextAppointments', Appointment::class);
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
