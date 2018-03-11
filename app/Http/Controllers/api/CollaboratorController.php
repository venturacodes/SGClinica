<?php
namespace Dentist\Http\Controllers\api;

use Carbon\Carbon;
use Dentist\Clinic;
use Dentist\Collaborator;
use Dentist\Job;
use Dentist\Traits\storeUser;
use Dentist\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Dentist\Http\Controllers\Controller;

class CollaboratorController extends Controller
{
    use storeUser;
    /**
     * Show all clinic.
     *  @return JsonResponse
     */
    public function index()
    {
        return new JsonResponse(Collaborator::all());
    }
    /**
     * Store a new collaborator
     * @var Request $request
     * @return Collaborator
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'clinic_id' => 'required|not_in:Selecione uma clínica',
            'job_id' => 'required|not_in:Selecione uma função',
        ]);
        $collaborator = new Collaborator();
        $collaborator->name = $request->name;
        $collaborator->user_id = Auth::user()->id;
        $collaborator->job_id = $request->job_id;
        $collaborator->clinic_id = $request->clinic_id;
        $collaborator->phone = $request->phone;


        $collaborator->save();

        return $collaborator;
    }
    public function update(Request $request)
    {
        $this->validate($request, [
            'clinic_id' => 'not_in:Selecione uma clínica',
            'job_id' => 'not_in:Selecione uma função',
        ]);
        $collaborator = Collaborator::find($request->id);

        $collaborator->name = $request->name;
        $collaborator->phone = $request->phone;
        $collaborator->job_id = $request->job_id;
        $collaborator->clinic_id = $request->clinic_id;

        $collaborator->updated_at = Carbon::now();

        $collaborator->save();

        return $collaborator;
    }
    public function edit(Request $request)
    {
        $collaborator = Collaborator::find($request->id);
        $clinics = Clinic::all('name', 'id');
        $jobs = Job::all('name', 'id');
        $data = [ 'jobs' => compact('jobs'), 'clinic' => compact('clinics') ];

        return view('collaborator.form_update', compact('collaborator'), compact('data'));
    }
}
