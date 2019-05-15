<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Receipt;
use App\Collaborator;
use App\Medicine;
use App\Client;
use App\Http\Controllers\Controller;

class ReceiptController extends Controller
{
    /**
     * Show all Receipts.
     *  @return JsonResponse
     */
    public function index(){
        $receipts = Receipt::all();
        return new JsonResponse($receipts);
    }
    /**
     * Show  Receipt.
     *  @return JsonResponse
     */
    public function show(Receipt $receipt){
        return view('receipt.show')
        ->with('receipt', $receipt)
        ->with('clients', Client::all())
        ->with('medicines', Medicine::all())
        ->with('collaborators',Collaborator::all());
    }
    /**
     * Creates a new Receipts
     * @var Request $request
     * @return JsonResponse
     */
    public function create(Request $request){    
        return view('receipt.form')->with('clients',Client::all('id', 'name'))
        ->with('medicines', Medicine::all('id', 'generic_name'))
        ->with('collaborators',Collaborator::all('id', 'name'));
    }
    /**
     * Store a new Receipt
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request){
        $this->validate($request, [
            'client_id'      => 'required',
            'medicine_id' =>'required',
            'forma_de_uso'  => 'required',
            'collaborator_id' => 'required'
        ]);
        $receipt = new Receipt();
        
        $receipt->client_id = $request->client_id;
        $receipt->medicine_id = $request->medicine_id;
        $receipt->form_of_use = $request->forma_de_uso;
        $receipt->collaborator_id = $request->collaborator_id;
       
        $receipt->save();

        return redirect()->route('receipt.index')->with('status','Receita adicionada com sucesso!');
    }
    /**
     * edit the Receipt
     * @var Request $request
     * @return JsonResponse
     */
    public function edit(Receipt $receipt){
        return view('receipt.form')->with('clients',Client::all('id', 'name'))
        ->with('medicines', Medicine::all('id', 'generic_name'))
        ->with('collaborators',Collaborator::all('id', 'name'))
        ->with('receipt', $receipt);
    }
    /**
     * Updates the Receipt
     * @var Request $request
     * @return JsonResponse
     */
    public function update(Request $request, $id){
        $receipt = Receipt::find($id);
        
        $receipt->client_id = $request->client_id;
        $receipt->medicine_id = $request->medicine_id;
        $receipt->form_of_use = $request->forma_de_uso;
        $receipt->collaborator_id = $request->collaborator_id;

        $receipt->save();

        return redirect()->route('receipt.index')->with('status','Receita atualizada com sucesso!');
    }
    /**
     * Removes a Receipt by it's id
     *
     * @return Collection
     */
    public function destroy($id){
        $receipt = Receipt::find($id);
        $receipt->delete();
        $receipt->deleted = true;
        return redirect()->route('receipt.index')->with('status','Receita excluída com sucesso!');
    }
}
