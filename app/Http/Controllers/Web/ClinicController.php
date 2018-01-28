<?php

namespace Dentist\Http\Controllers\Web;

use Dentist\Clinic;
use Dentist\Collaborator;
use Dentist\Http\Controllers\Controller;
use Dentist\Http\Resources\ClinicCollection;
use Dentist\Http\Resources\ClinicResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Collection;

class ClinicController extends Controller
{
    /**
     * Show all clinic.
     *  @return JsonResponse
     */
    public function index()
    {
        $clinics = Clinic::all();
        foreach($clinics as $clinic){
            $clinic->endereco = $clinic->address()->get()->first();
            unset($clinic->address_id);
            unset($clinic->endereco->id);
        }
        return new JsonResponse($clinics);

    }
    /**
     * Creates a new clinic
     * @var Request $request
     * @return JsonResponse
     */
    public function create(Request $request)
    {
        $this->validate($request, [
           'clinica' => 'required|max:255',
        ]);

        $clinic = new Clinic();
        $clinic->name = $request->name;
        $clinic->address = $request->address;
        $clinic->save();

        return new JsonResponse($clinic);
    }
    /**
     * Updates the Clinic
     * @var Request $request
     * @return JsonResponse
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'clinica' => 'required|max:255',
        ]);

        $clinic = Clinic::find($id);
        $clinic->name = $request->name;
        $clinic->address = $request->address;
        $clinic->save();

        return new JsonResponse($clinic);
    }
    /**
     * Removes a clinic by it's id
     *
     * @return Collection
     */
    public function delete($id)
    {
        $clinic = Clinic::find($id);
        $clinic->delete();
        $clinic->deleted = true;
        return new JsonResponse($clinic);
    }

    /**
     * Updates the Clinic
     * @var Request $request
     * @return JsonResponse
     */
    public function choose_clinic(Request $request){
        if($request->has('clinic_id')){
            session(['chosen_clinic' => Clinic::find($request->get('clinic_id') ) ] );
            return redirect('home');
        }
        $logged_user = auth()->user();
        $logged_collaborator = Collaborator::where('user_id',$logged_user->id)->first();
        return view('clinic.choose_clinic')->with('clinics', $logged_collaborator->clinics);
    }
}
