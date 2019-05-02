<?php

namespace App\Http\Controllers\Web;

use App\Clinic;
use App\Address;
use App\Collaborator;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Collection;
use App\Http\Controllers\Controller;
use App\Http\Requests\Clinic\storeClinicRequest;
use App\Http\Requests\Clinic\updateClinicRequest;

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
        return view('clinic.form');
    }
    public function store(storeClinicRequest $request){
        Clinic::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address
        ]);

        return redirect()->route('clinic.index')->with('status', 'Clínica cadastrada com sucesso.');
    }
    /**
     * edit the Clinic
     * @var Request $request
     * @return JsonResponse
     */
    public function edit(Clinic $clinic)
    {
        return view('clinic.form')->with('clinic', $clinic);
    }
    /**
     * Updates the Clinic
     * @var Request $request
     * @return JsonResponse
     */
    public function update(updateClinicRequest $request, $id)
    {
        $clinic = Clinic::find($id);

        $clinic->name = $request->name;
        $clinic->email = $request->email;
        $clinic->phone = $request->phone;
        $clinic->address = $request->address;

        $clinic->save();

        return redirect()->route('clinic.index')->with('status', 'Clínica atualizada com sucesso.');
    }
    /**
     * Removes a clinic by it's id
     *
     * @return Collection
     */
    public function destroy(Clinic $clinic)
    {
        if($clinic->appointments->count() > 0){
            return redirect()->route('clinic.index')->with('status-alert','Clínica não pode ser deletada por estar vinculada a pelo menos um agendamento.');
        }
        $clinic->delete();
        $clinic->deleted = true;
        return redirect()->route('clinic.index')->with('status', 'Clínica deletada com sucesso.');
    }
}
