<?php

namespace Dentist\Http\Controllers\Api;

use Dentist\Appointment;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Dentist\Http\Controllers\Controller;

class AppointmentController extends Controller
{
    /**
     * Show all users.
     *  @return JsonResponse
     */
    public function index(Request $request)
    {
        return new JsonResponse(Appointment::where('clinic_id',session('chosen_clinic')->id)->get());
    }
    public function create(Request $request)
    {
        $appointment = new Appointment();

        $appointment->start_time = $request->start_time;
        $appointment->end_time = $request->end_time;
        $appointment->clinic_id = $request->clinic_id;
        $appointment->client_id = $request->client_id;
        $appointment->collaborator_id = $request->collaborator_id;
        $appointment->user_id = $request->user_id;
        $appointment->appointment_status_id = $request->appoitment_status_id;
        $appointment->note = $request->note;

        $appointment->save();


        return new JsonResponse($appointment);
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
     * Show appointments by it's clinic_id.
     *  @return JsonResponse
     */
    public function showByClinicId($clinic_id)
    {
        return new JsonResponse(Appointment::where('clinic_id',$clinic_id)->get());
    }
}
