<?php

namespace App\Http\Controllers\Web;

use App\Address;
use App\Client;
use App\User;
use App\Appointment;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClientController extends Controller
{
    /**
     * Show all client.
     *  @return JsonResponse
     */
    public function index()
    {
        return new JsonResponse(Client::all());
    }
    /**
     * Show a client.
     *  @return JsonResponse
     */
    public function show(Request $request, $id)
    {
        $client = Client::find($id);
        $appointments = Appointment::where([
                ['client_id','=', $id],
                ['is_done','=', 1]
            ])->get();
        $client['appointments'] = compact('appointments');
        
        return view('client.show',compact('client'));
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
        $user = $this->store_user($request);
        $client = new Client();

        $client->name = $request->name;
        $client->phone = $request->phone;
        $client->user_id = $user->id;

        $client->save();

        return redirect()->route('client.index')->with('status', 'Paciente adicionado com sucesso!');
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

        $client = Client::find($request->id);

        $client->name = $request->name;
        $client->phone = $request->phone;
        $client->email = $request->email;

        $client->save();

        return redirect()->route('client.index')->with('status', 'Paciente atualizado com sucesso!');
    }
    public function destroy(Request $request)
    {
        $client = Client::find($request->id);
        Client::destroy($request->id);

        return redirect()->route('client.index')->with('status', 'Paciente excluído com sucesso!');
    }
}
