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
     * Creates a new Receipts
     * @var Request $request
     * @return JsonResponse
     */
    public function create(Request $request){
        $clients = Client::all('id', 'name');
        $medicines = Medicine::all('id', 'generic_name');
        $collaborators = Collaborator::all('id', 'name');
        $data = ['collaborators' => compact('collaborators'), 'medicines' => compact('medicines'), 'clients' => compact('clients') ];
        
        return view('receipt.form_create', compact('data'));
    }
    /**
     * Store a new Receipt
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request){
        $receipt = new Receipt();
        
        $receipt->client_id = $request->client_id;
        $receipt->medicine_id = $request->medicine_id;
        $receipt->form_of_use = $request->form_of_use;
        $receipt->collaborator_id = $request->collaborator_id;
       
        $receipt->save();

        return redirect()->route('receipt.index');
    }
    /**
     * edit the Receipt
     * @var Request $request
     * @return JsonResponse
     */
    public function edit(Request $request, $id){

        $receipt = Receipt::find($id);
        return view('receipt.form_update', $receipt);
    }
    /**
     * Updates the Receipt
     * @var Request $request
     * @return JsonResponse
     */
    public function update(Request $request, $id){
        $receipt = Medicine::find($id);
        
        $receipt->pacient_id = $request->pacient_id;
        $receipt->medicine_id = $request->medicine_id;
        $receipt->form_of_use = $request->form_of_use;
        $receipt->collaborator_id = $request->collaborator_id;

        $receipt->save();

        return redirect()->route('receipt.index');
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
        return new JsonResponse($receipt);
    }
}
