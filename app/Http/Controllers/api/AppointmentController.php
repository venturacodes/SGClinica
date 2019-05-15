<?php

namespace App\Http\Controllers\api;

use Carbon\Carbon;
use App\Appointment;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\storeAppointmentRequest;

class AppointmentController extends Controller
{
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
    public function create(storeAppointmentRequest $request)
    {
        $appointment = Appointment::create([
            'title' => $request->title,
            'start' => new Carbon($request->start),
            'end'  => new Carbon($request->end),
            'note' => $request->note,
            'client_id' => $request->client_id,
            'collaborator_id' => $request->collaborator_id
        ]); 
        return new JsonResponse($appointment);
    }
     /**
     * function used to update appointments through AJAX Requests from modal_create at fullcalendar.
     *
     * @param Request $request
     * @return void
     */
    public function update($appointment_id, Request $request)
    {
        $appointment = Appointment::find($appointment_id);
        $appointment->title = $request->title;
        $appointment->start = new Carbon($request->start);
        $appointment->end = new Carbon($request->end);
        $appointment->note = $request->note;
        $appointment->client_id = $request->client_id;
        $appointment->collaborator_id = $request->collaborator_id;
        
        $appointment->save();


        return new JsonResponse($appointment);
    }
     /**
     * function used to create appointments through AJAX Requests from modal_create at fullcalendar.
     *
     * @param Request $request
     * @return void
     */
    public function create_for_the_web(Request $request)
    {
        $data = $request->all();
        $appointment = new Appointment();
        $data['start_time'] = new Carbon($request->start_time);
        $data['end_time'] = new Carbon($request->start_time);
        $data['end_time']->addMinutes(Appointment::DEFAULT_DURATION);
        $appointment->note = $request->note;
        $appointment->prepare($data);
        $appointment->save();

        return new JsonResponse($appointment);
    }
    /**
     * Show appointments by it's client_id.
     *  @return JsonResponse
     */
    public function showByClientId($client_id)
    {
        return new JsonResponse(Appointment::where('client_id', $client_id)->get());
    }
    /**
     * Show appointments by it's collaborator_id.
     *  @return JsonResponse
     */
    public function showByCollaboratorId($collaborator_id)
    {
        return new JsonResponse(Appointment::where('collaborator_id', $collaborator_id)->get());
    }
    /**
     * Show appointments by it's clinic_id.
     *  @return JsonResponse
     */
    public function showByClinicId($clinic_id)
    {
        return new JsonResponse(Appointment::where('clinic_id', $clinic_id)->get());
    }
    public function delete($appointment_id)
    {
        $appointment = Appointment::find($appointment_id);
        $appointment->delete();
        $appointment->deleted = true;

        return new JsonResponse($appointment);
    }
}
