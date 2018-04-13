<?php

namespace Dentist\Http\Controllers\Web;

use Dentist\Clinic;
use Dentist\Collaborator;
use Dentist\Address;
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
        return view('clinic.form_create', compact('data'));
    }
    public function store(Request $request){
        $clinic = new Clinic();
        $clinic->name = $request->name;
        $clinic->email = $request->email;
        $clinic->phone = $request->phone;
        $clinic->latitude = '0';
        $clinic->longitude = '0';
        $clinic->address_id = $this->store_address($request);
        $clinic->save();

        return redirect()->route('clinic.index');
    }
    public function store_address(Request $request){
        $data = $request->all();
        $address = new Address();
        $address->cep = $data['cep'];
        $address->uf = $data['uf'];
        $address->cidade = $data['cidade'];
        $address->bairro = $data['bairro'];
        $address->logradouro = $data['logradouro'];
        $address->numero = $data['numero'];
        $address->complemento = $data['complemento'];
        $address->save();

        return $address->id;
    }
    /**
     * edit the Clinic
     * @var Request $request
     * @return JsonResponse
     */
    public function edit(Request $request, $id)
    {

        $clinic = Clinic::find($id);
        $address = Address::find($clinic->address_id);
        $data = ['clinic'=>$clinic, 'address'=>$address];
        return view('clinic.form_update', compact('data'));
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
        $clinic->latitude = '0';
        $clinic->longitude = '0';
        $clinic->address_id = $this->update_address($clinic->address_id, $request);

        $clinic->save();

        return redirect()->route('clinic.index');
    }
    public function update_address($id, Request $request){
        $data = $request->all();
        $address = Address::find($id);
        $address->cep = $data['cep'];
        $address->uf = $data['uf'];
        $address->cidade = $data['cidade'];
        $address->bairro = $data['bairro'];
        $address->logradouro = $data['logradouro'];
        $address->numero = $data['numero'];
        $address->complemento = $data['complemento'];
        $address->save();

        return $address->id;
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
