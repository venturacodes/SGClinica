<?php

namespace Dentist\Http\Controllers\Api;

use Dentist\Address;
use Dentist\Client;
use Dentist\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Dentist\Http\Controllers\Controller;
use Dentist\Http\Resources\ClientResource;

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
     * When you store a new client you need to store a user too since it will be used by the api, and it's easy to scale, if the client needs to access the web-side.
     * @var Request $request
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $user_for_client = new User();
        if (User::where('email', '=', $data['email'])->exists()) {
             return new JsonResponse(['message' => 'E-mail já cadastrado.'], 500);
        }
        $data['role_id'] = User::CLIENT_ROLE;
        $user_for_client->prepare($data);
        $user_for_client->save();
        $data['user_id'] =  $user_for_client->id;

        $client = new Client($data);
        $client->save();

        return new ClientResource($client);
    }


}
