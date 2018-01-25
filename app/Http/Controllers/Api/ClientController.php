<?php

namespace Dentist\Http\Controllers\Api;

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
     * Store a new collaborator
     * @var Request $request
     * @return JsonResponse
     */
    public function store(Request $request)
    {

    }
    public function update(Request $request){

    }

    public function destroy(Request $request)
    {

    }
}
