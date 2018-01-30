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
        $user_for_client = new User();
        $request->merge(['role_id' => User::TIPO_CLIENTE]);
        $user_for_client->prepare($request->all());
        $user_for_client->save();
        $request->merge(['user_id' => $user_for_client->id]);
        $client = new Client();
        $client->prepare($request->all());
        $client->save();
        $client->email = $client->user->email;
        unset($client->user);
        unset($client->address_id);
        unset($client->updated_at);
        unset($client->created_at);
        return $client;
    }
}
