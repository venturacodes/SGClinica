<?php

namespace App\Http\Controllers\Web;

use App\User;
use App\Client;
use App\Clinic;
use App\Receipt;
use App\Medicine;
use Carbon\Carbon;
use App\Appointment;
use App\Collaborator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
        $collaborators = collect();
        foreach(User::with('collaborator')->where('role_id', 4)->get() as $user){
            $collaborators->push($user->collaborator);
        }
        return view('appointment')
        ->with('clinics',Clinic::all('name', 'id'))
        ->with('collaborators', $collaborators)
        ->with('clients', Client::all('name','id'));
    }
    public function appointment()
    {
        $collaborators = collect();
        foreach(User::with('collaborator')->where('role_id', 4)->get() as $user){
            $collaborators->push($user->collaborator);
        }   
        return view('appointment')
        ->with('clinics',Clinic::all('name', 'id'))
        ->with('collaborators', $collaborators)
        ->with('clients', Client::all('name','id'));
    }
    public function collaborator()
    {
        return view('collaborator.index')
        ->with('collaborators', Collaborator::paginate(3));
    }
    public function collaboratorDestroy($id)
    {
        $collaborator = Collaborator::find($id);
        $collaborator->destroy($id);
        return new JsonResponse($collaborator);
    }
    public function clinic()
    {
        return view('clinic.index')
        ->with('clinics',Clinic::paginate(3));
    }
    public function client()
    {
        return view('client.index')
        ->with('clients',Client::paginate(3));
    }
    public function medicine()
    {
        return view('medicine.index')
        ->with('medicines',Medicine::paginate(3));
    }
    public function receipt()
    { 
        return view('receipt.index')
        ->with('receipts', Receipt::paginate(3));
    }
    public function exam()
    {
        $exams = Exam::all();
        
        return view('exam.index')
        ->with('exams', $exams);
    }
    public function report()
    {
        return view('report.index');
    }
}
