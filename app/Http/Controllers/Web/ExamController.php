<?php

namespace App\Http\Controllers\Web;

use App\Exam;
use App\Client;
use App\ExamType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\storeExamRequest;

class ExamController extends Controller
{

    public function pdf()
    {

    }
    public function index()
    {
        return Exam::all();
    }
    public function store(storeExamRequest $request)
    {
        $exam = Exam::create([
            'client_id' => $request->client_id,
            'collaborator_id' => $request->collaborator_id,
            'exam_type_id' => $request->exam_type_id,
            'name' => $request->name,
        ]);
        if(isset($request->file)){
            $exam->file = $request->file->store('exams');
            $exam->save();
        }

        return redirect()->route('client.show', $request->client_id)->with('status', 'Exame adicionado como sucesso!');
    }
    public function create(Client $client)
    {
        return view('exam.form')
        ->with('client', $client)
        ->with('examTypes', ExamType::all());
    }    
    public function destroy($id)
    {
        $exam = Exam::find($id);
        $exam->delete();
        $exam->deleted = true;

        return redirect()->route('exam.index')->with('status', 'Exame excluído com sucesso!');
    }
    public function edit()
    {
        return view('exam.form')
        ->with('exams', $exam)
        ->with('ExamTypes', ExamType::all());
    }
    public function update(Request $request, $id)
    {
        $exam = Exam::findorFail($id);

        $exam->client_id = $request->client_id;
        $exam->collaborator_id = $request->collaborator_id;
        $exam->exam_type_id = $request->exam_type_id;
        $exam->name = $request->name;

        if(isset($request->file)){
            $exam->file = $request->file->store('exams');
            $exam->save();
        }

        $exam->save();

        return redirect()->route('exam.index')->with('status','Exame atualizado com sucesso!');
    }
    public function show(Exam $exam)
    {
        return view('exam.show')
        ->with('exams', $exam)
        ->with('ExamTypes', ExamType::all());
    }
}
