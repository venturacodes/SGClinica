<?php

namespace Dentist\Http\Controllers\Web;

use Dentist\Address;
use Dentist\Client;
use Dentist\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Dentist\Http\Controllers\Controller;

class ClientController extends Controller
{
    /**
     * Show all clinic.
     *  @return JsonResponse
     */
    public function index()
    {
        return new JsonResponse(Client::all());
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
    public function store(Request $request)
    {
        $address = $this->store_address($request);
        $user = $this->store_user($request);
        $client = new Client();

        $client->name = $request->name;
        $client->phone = $request->phone;
        $client->user_id = $user->id;
        $client->address_id = $address->id;

        $client->save();

        return redirect()->route('client.index')->with('status', 'Cliente adicionado com sucesso!');
    }
    public function store_address(Request $request){
        $address = new Address();

        $address->cep = $request->cep;
        $address->uf = $request->uf;
        $address->cidade = $request->cidade;
        $address->bairro = $request->bairro;
        $address->logradouro = $request->logradouro;
        $address->numero = $request->numero;
        $address->complemento = $request->complemento;

        $address->save();

        return $address;

    }
    public function store_user(Request $request){
        $user = new User();

        $user->email = $request->email;
        $user->password = $request->password;

        $user->save();

        return $user;
    }
    public function edit(Request $request){
        $client = Client::find($request->id);

        return view('client.form_update',compact('client'));
    }
    public function update(Request $request){

        $address = Address::find($client->address_id);
        $address->cep = $request->cep;
        $address->uf = $request->uf;
        $address->cidade = $request->cidade;
        $address->bairro = $request->bairro;
        $address->logradouro = $request->logradouro;
        $address->numero = $request->numero;
        $address->complemento = $request->complemento;

        $address->save();

        $client->name = $request->name;
        $client->phone = $request->phone;
        $client->address_id = $address->id;

        $client->save();

        return redirect()->route('client.index')->with('status', 'Cliente atualizado com sucesso!');
    }
    public function destroy(Request $request)
    {
        $client = Client::find($request->id);
        User::destroy($client->user_id);
        Address::destroy($client->address_id);
        Client::destroy($request->id);

        return redirect()->route('client.index')->with('status', 'Cliente excluído com sucesso!');
    }
}
