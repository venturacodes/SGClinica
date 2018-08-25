<?php

namespace Dentist\Http\Controllers\Web;

use Dentist\Clinic;
use Dentist\Collaborator;
use Dentist\Address;
use Dentist\Http\Controllers\Controller;
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
        return new JsonResponse($clinics);

    }
    /**
     * Creates a new clinic
     * @var Request $request
     * @return JsonResponse
     */
    public function create(Request $request)
    {
        return view('clinic.form_create', compact('data'));
    }
    public function store(Request $request){
        $clinic = new Clinic();
        $clinic->name = $request->name;
        $clinic->email = $request->email;
        $clinic->phone = $request->phone;
        $clinic->save();

        return redirect()->route('clinic.index');
    }
    /**
     * edit the Clinic
     * @var Request $request
     * @return JsonResponse
     */
    public function edit(Request $request, $id)
    {

        $clinic = Clinic::find($id);
        return view('clinic.form_update', $clinic);
    }
    /**
     * Updates the Clinic
     * @var Request $request
     * @return JsonResponse
     */
    public function update(Request $request, $id)
    {
        $clinic = Clinic::find($id);
        $clinic->name = $request->name;
        $clinic->email = $request->email;
        $clinic->phone = $request->phone;

        $clinic->save();

        return redirect()->route('clinic.index');
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
