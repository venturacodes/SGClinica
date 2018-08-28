<?php

namespace App\Http\Controllers\Web;

use Carbon\Carbon;
use App\Appointment;
use App\Client;
use App\Clinic;
use App\Medicine;
use App\Collaborator;
use App\Receipt;
use App\Http\Controllers\Controller;
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
    public function medicine()
    {
        $medicines = Medicine::all();
        return view('medicine.index', compact('medicines'));
    }
    public function receipt()
    {
        $receipts = Receipt::all();
        return view('receipt.index', compact('receipts'));
    }
    public function report()
    {
        return view('report.index');
    }
}
