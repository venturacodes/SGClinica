<?php

namespace App\Http\Controllers\Web;

use PDF;
use App\Client;
use App\Receipt;
use App\Medicine;
use App\Collaborator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\storeReceiptRequest;

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

    public function generatePDF(Receipt $receipt){
        $data = [
            'receipt' => $receipt,
        ];
        $pdf = PDF::loadView('receipt.receipt_pdf', $data);
        return $pdf->download('Receita.pdf');
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
    public function create(Request $request, Client $client){    
        return view('receipt.form')
        ->with('client', $client)
        ->with('medicines', Medicine::all('id', 'generic_name'))
        ->with('collaborators',Collaborator::all('id', 'name'));
    }
    /**
     * Store a new Receipt
     *
     * @param Request $request
     * @return void
     */
    public function store(storeReceiptRequest $request){ 
        
        Receipt::create([
            'client_id' => $request->client_id,
            'medicine_id' => $request->medicine_id,
            'collaborator_id' => $request->collaborator_id,
        ]);
       
        return redirect()->route('client.show', $request->client_id)->with('status','Receita adicionada com sucesso!');
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
