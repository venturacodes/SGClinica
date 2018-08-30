<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Appointment;
use App\Http\Controllers\Controller;

class ConsultaController extends Controller
{
    /**
     * Inicia uma consulta por parte do médico
     *
     * @param Request $request
     * @param [type] $id
     * @return void
     */
    public function attendTo(Request $request, $id)
    {
        $appointment = Appointment::find($id);

        return view('consulta.attend_to', compact('appointment')); 
    }
    /**
     * Method responsible for store a Consulta.
     *
     * @return void
     */
    public function store(Request $request)
    {
        return redirect()->route('consulta.need_exams', $consulta->id)->with('status', 'Paciente adicionado com sucesso!');
    }
    public function needExams(Request $request, $id)
    {
        $appointment = Appointment::find($id);
        return view('consulta.need_exams', compact('appointment'));
    }
    public function needReceipts(Request $request, $id)
    {
        return view('consulta.need_receipts');
    }
}
