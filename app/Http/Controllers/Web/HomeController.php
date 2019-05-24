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
        return view('collaborator.index')->with('collaborators', Collaborator::paginate(3));
    }
    public function collaboratorDestroy($id)
    {
        $collaborator = Collaborator::find($id);
        $collaborator->destroy($id);
        return new JsonResponse($collaborator);
    }
    public function clinic()
    {
        return view('clinic.index')->with('clinics',Clinic::paginate(3));
    }
    public function client()
    {
        return view('client.index')->with('clients',Client::paginate(3));
    }
    public function medicine()
    {
        return view('medicine.index')->with('medicines',Medicine::paginate(3));
    }
    public function receipt()
    { 
        return view('receipt.index')->with('receipts', Receipt::paginate(3));
    }
    public function exam()
    {
        $exams = Exam::all();
        
        return view('exam.index')->with('exams', $exams);
    }
    public function report()
    {
        return view('report.index');
    }
}
