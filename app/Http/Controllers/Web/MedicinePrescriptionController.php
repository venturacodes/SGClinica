<?php

namespace App\Http\Controllers\Web;

use App\Receipt;
use App\Medicine;
use App\PrescriptMedicine;
use Illuminate\Http\Request;
use App\ReceiptPrescriptMedicine;
use App\Http\Controllers\Controller;

class MedicinePrescriptionController extends Controller
{
    public function create(Receipt $receipt){
        return view('medicine_prescription.form')->with('receipt',$receipt)->with('medicines',Medicine::all());
    }
    public function store(Request $request, Receipt $receipt){
        $presciptMedicine = PrescriptMedicine::create([
            'medicine_id'=>$request->medicine_id,
            'quantity'=>$request->quantity,
            'period'=>$request->period,
            'form_of_use'=>$request->form_of_use]);
        ReceiptPrescriptMedicine::create([
            'prescript_medicine_id'=>$presciptMedicine->id,
            'receipt_id'=>$receipt->id
        ]);        
        return redirect()->route('receipt.show',$receipt->id)->with('status','Medicamento adicionado a receita com sucesso!');
    }
    public function edit(Receipt $receipt,PrescriptMedicine $prescript_medicine){
        return view('medicine_prescription.form')->with('prescript_medicine',$prescript_medicine)->with('receipt',$receipt)->with('medicines',Medicine::all());
    }
    public function update(Request $request, Receipt $receipt, PrescriptMedicine $prescript_medicine){
        $prescript_medicine->period = $request->period;
        $prescript_medicine->quantity = $request->quantity;
        $prescript_medicine->medicine_id = $request->medicine_id;
        $prescript_medicine->form_of_use = $request->form_of_use;
        $prescript_medicine->save();
        return redirect()->route('receipt.show',$receipt->id)->with('status','Medicamento atualizado com sucesso!');
    }
    public function destroy(Receipt $receipt, PrescriptMedicine $prescript_medicine){
        ReceiptPrescriptMedicine::where('receipt_id', $receipt->id)->where('prescript_medicine_id',$prescript_medicine->id)->delete();
        PrescriptMedicine::where('id',$prescript_medicine->id)->delete();
        return redirect()->route('receipt.show',$receipt->id)->with('status','Medicamento deletado da receita com sucesso!');;
    }
}
