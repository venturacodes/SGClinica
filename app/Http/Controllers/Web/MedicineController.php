<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Medicine;
use App\Http\Controllers\Controller;

class MedicineController extends Controller
{
     /**
     * Show all Medicines.
     *  @return JsonResponse
     */
    public function index()
    {
        $medicines = Medicine::all();
        return new JsonResponse($medicines);

    }
    /**
     * Creates a new Medicine
     * @var Request $request
     * @return JsonResponse
     */
    public function create(Request $request)
    {
        return view('medicine.form');
    }
    /**
     * Store a new Medicine
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request){
        Medicine::create([
            'generic_name' => $request->generic_name,
            'manufacturer_name' => $request->manufacturer_name,
            'manufacturer' => $request->manufacturer,
        ]);

        return redirect()->route('medicine.index')->with("status", "Remédico cadastrado com sucesso.");
    }
    /**
     * edit the Medicine
     * @var Request $request
     * @return JsonResponse
     */
    public function edit(Request $request, $id)
    {
        $medicine = Medicine::find($id);
        return view('medicine.form', compact('medicine'));
    }
    /**
     * Updates the Medicine
     * @var Request $request
     * @return JsonResponse
     */
    public function update(Request $request, $id)
    {
        $medicine = Medicine::find($id);

        $medicine->generic_name = $request->generic_name;
        $medicine->manufacturer_name = $request->manufacturer_name;
        $medicine->manufacturer = $request->manufacturer;

        $medicine->save();

        return redirect()->route('medicine.index')->with('status', 'Medicamento editado com sucesso!');
    }
    /**
     * Removes a Medicine by it's id
     *
     * @return Collection
     */
    public function destroy($id)
    {
        $medicine = Medicine::find($id);
        if($medicine->receipts->count() > 0){
            return redirect()->route('medicine.index')->with('status-alert', 'Não é possível deletar o medicamento, pois ele está vinculado a pelo menos uma receita.');
        }
        $medicine->delete();
        $medicine->deleted = true;
        return redirect()->route('medicine.index')->with('status', 'Medicamento deletado com sucesso!');
    }
    public function searchByName(Request $request)
    {
        if(!$request->name){
            return redirect()->route('medicine.index')
            ->with('medicines',Medicine::paginate(3))
            ->with('status-info','Preencha o campo de busca para efetuar uma pesquisa.');
        }
        $medicine = Medicine::where('generic_name','LIKE', "%{$request->name}%")->first();
        if(!$medicine){
            return redirect()->route('medicine.index')
            ->with('medicines',Medicine::paginate(3))
            ->with('status-info','Medicamento não encontrado.');
        }
        return view('medicine.index_filtered')
        ->with('medicines',Medicine::where('generic_name','LIKE',"%{$request->name}%")->paginate(3))
        ->with('filtered_content', $request->name);        
    }
}
