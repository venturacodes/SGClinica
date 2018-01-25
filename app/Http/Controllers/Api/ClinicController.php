<?php

namespace Dentist\Http\Controllers\Api;

use Dentist\Clinic;
use Dentist\Collaborator;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Collection;
use Dentist\Http\Controllers\Controller;

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
}
