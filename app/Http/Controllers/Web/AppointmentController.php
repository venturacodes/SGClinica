<?php

namespace App\Http\Controllers\Web;

use App\Appointment;
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
        $appointments = Appointment::all();

        return view('appointment.next_appointments', compact('appointments')); 
    }

    public function edit(Request $request, $id)
    {
        return null;
    }
    public function destroy(Request $request, $id)
    {
        return null;
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
        $appointment = Appointment::find($id);

        return view('appointment.attend_to', compact('appointment')); 
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
        $appointment = Appointment::find($id);
        dd($appointment);
        return redirect()->route('appointment.need_exams', $appointment->id)->with('status', 'Paciente adicionado com sucesso!');
    }
    public function needExams(Request $request, $id)
    {
        $appointment = Appointment::find($id);
        return view('appointment.need_exams', compact('appointment'));
    }
    public function needReceipts(Request $request, $id)
    {
        return view('appointment.need_receipts');
    }
}
