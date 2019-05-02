<?php

namespace App\Http\Controllers\Web;

use App\User;
use App\Client;
use App\Address;
use App\Appointment;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\Client\storeClientRequest;
use App\Http\Requests\Client\updateClientRequest;

class ClientController extends Controller
{
    /**
     * Show all client.
     *  @return JsonResponse
     */
    public function index()
    {
        return view('client.index')->with('clients',Client::all());
    }
    /**
     * Show a client.
     *  @return JsonResponse
     */
    public function show(Request $request, $id)
    {
        $client = Client::findOrFail($id);
        $appointments = Appointment::where([
            'client_id' => $id,
            'is_done' => true
        ])->get();
        return view('client.show')->with('client',$client)->with('appointments', $appointments);
    }
    /**
     * Creates a new client
     * @var Request $request
     * @return JsonResponse
     */
    public function create(Request $request)
    {
        return view('client.form_create');
    }
    /**
     * Store a new client
     * @var Request $request
     * @return JsonResponse
     */
    public function store(storeClientRequest $request)
    {
        Client::create([
            'clinic_id' => 1,
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email
        ]); 

        return redirect()->route('client.index')->with('status', 'Paciente adicionado com sucesso!');
    }
    public function edit(Request $request){
        return view('client.form_update')->with('client', Client::findOrFail($request->id));
    }
    public function update(updateClientRequest $request){

        $client = Client::findorFail($request->id);

        $client->name = $request->name;
        $client->phone = $request->phone;
        $client->email = $request->email;

        $client->save();

        return redirect()->route('client.index')->with('status', 'Paciente atualizado com sucesso!');
    }
    public function destroy(Request $request)
    {
        Client::destroy($request->id);

        return redirect()->route('client.index')->with('status', 'Paciente excluído com sucesso!');
    }
}
