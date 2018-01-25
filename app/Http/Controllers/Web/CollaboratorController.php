<?php

namespace Dentist\Http\Controllers\Web;

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
     * Creates a new clinic
     * @var Request $request
     * @return JsonResponse
     */
    public function create(Request $request)
    {
        $clinics = Clinic::all('clinica','id');
        $jobs = Job::all('name','id');
        $data = [ 'jobs' => compact('jobs'), 'clinic' => compact('clinics') ];
        return view('collaborator.form_create', compact('data'));
    }
    /**
     * Store a new collaborator
     * @var Request $request
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'      => 'required|max:255',
            'phone'  => 'required',
            'clinica' => 'required|not_in:0',
            'trabalho'    => 'required|not_in:0',
        ]);
        $collaborator = new Collaborator();
        $user = $this->store_user($request);

        $collaborator->user_id = $user->id;

        $collaborator->name = $request->name;
        $collaborator->job_id = $request->trabalho;
        $collaborator->clinic_id = $request->clinica;
        $collaborator->phone = $request->phone;
        $collaborator->color = $request->color;

        $collaborator->save();

        return redirect()->route('collaborator.index')->with('status', 'Funcionario adicionado com sucesso!');
    }
    public function edit(Request $request){
        $collaborator = Collaborator::find($request->id);
        $clinics = Clinic::all('clinica','id');
        $jobs = Job::all('name','id');
        $data = [ 'jobs' => compact('jobs'), 'clinic' => compact('clinics') ];

        return view('collaborator.form_update',compact('collaborator'), compact('data'));
    }
    public function update(Request $request){
        $this->validate($request, [
            'clinic_id' => 'not_in:Selecione uma clínica',
            'job_id' => 'not_in:Selecione uma função',
        ]);

        $collaborator = Collaborator::find($request->id);

        $collaborator->name = $request->name;
        $collaborator->phone = $request->phone;
        $collaborator->job_id = $request->job_id;
        $collaborator->clinic_id = $request->clinic_id;
        $collaborator->color = $request->color;
        $collaborator->updated_at = Carbon::now();

        $collaborator->save();

        return redirect()->route('collaborator.index')->with('status', 'Funcionario atualizado com sucesso!');
    }
    public function destroy(Request $request)
    {
        $collaborator = Collaborator::find($request->id);
        User::destroy($collaborator->user_id);
        Collaborator::destroy($request->id);
        return redirect()->route('collaborator.index')->with('status', 'Funcionario excluído com sucesso!');
    }
}
