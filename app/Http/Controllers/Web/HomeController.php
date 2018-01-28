<?php

namespace Dentist\Http\Controllers\Web;

use Carbon\Carbon;
use Dentist\Appointment;
use Dentist\Client;
use Dentist\Clinic;
use Dentist\Collaborator;
use Dentist\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clinics = Clinic::all('name', 'id');
        $collaborators = Collaborator::all('name', 'id');
        $clients = Client::all('name', 'id');
        $data = [ 'clinic' => compact('clinics'), 'collaborators' => compact('collaborators'), 'clients' => compact('clients') ];
        return view('appointment', compact('data'));
    }
    public function appointment()
    {
        $clinics = Clinic::all('name', 'id');
        $collaborators = Collaborator::all('name', 'id');
        $clients = Client::all('name', 'id');
        $data = [ 'clinic' => compact('clinics'), 'collaborators' => compact('collaborators'), 'clients' => compact('clients') ];
        return view('appointment', compact('data'));
    }
    public function collaborator()
    {
        return view('collaborator.index', ['collaborators' => Collaborator::all() ]);
    }
    public function collaboratorDestroy($id)
    {
        $collaborator = Collaborator::find($id);
        $collaborator->destroy($id);

        return new JsonResponse($collaborator);
    }
    public function clinic()
    {

        $clinics = Clinic::all();
        return view('clinic.index', compact('clinics'));
    }
    public function client()
    {
        $clients = Client::all();
        return view('client.index', compact('clients'));
    }
    public function downloadApp()
    {
        return view('download_app');
    }
}
