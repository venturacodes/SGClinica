<?php

namespace App\Http\Controllers\Web;

use App\Exam;
use App\Client;
use App\Result;
use App\ExamType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\storeExamRequest;
use Illuminate\Support\Facades\Storage;

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
    public function download(Exam $exam){
        return response()->download('storage/'.$exam->file);
    }
    public function result(Request $request, Exam $exam){
        Result::create([
            'collaborator_id'=>auth()->user()->collaborator->id,
            'exam_id' => $exam->id,
            'client_id'=>$exam->client_id,
            'result'=>$request->result,
        ]);
        $exam->status = 2;
        $exam->save();
        return redirect()->route('client.show', $exam->client_id)->with('status', 'Resultado adicionado com sucesso!');
    }
    public function create(Client $client)
    {
        return view('exam.form')
        ->with('client', $client)
        ->with('examTypes', ExamType::all());
    }
    public function evaluate(Exam $exam)
    {
        return view('result.form')->with('exam', $exam);
    }      
    public function destroy($id)
    {
        $exam = Exam::find($id);
        $exam->delete();
        $exam->deleted = true;

        return redirect()->route('exam.index')->with('status', 'Exame excluído com sucesso!');
    }
    public function edit(Exam $exam)
    {
        return view('exam.form')
        ->with('exam', $exam)
        ->with('examTypes', ExamType::all());
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
            $exam->status = 1;
            $exam->save();
        }

        $exam->save();

        return redirect()->route('client.show', $request->client_id)->with('status','Exame atualizado com sucesso!');
    }
    public function show(Exam $exam)
    {
        return view('exam.show')
        ->with('exams', $exam)
        ->with('ExamTypes', ExamType::all());
    }
}
