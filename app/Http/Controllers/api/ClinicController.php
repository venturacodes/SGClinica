<?php

namespace Dentist\Http\Controllers\api;

use Dentist\Clinic;
use Dentist\Collaborator;
use Dentist\Http\Controllers\Controller;
use Dentist\Http\Resources\ClinicCollection;
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
        return new ClinicCollection(Clinic::all());
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
