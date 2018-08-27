<?php

namespace Dentist\Http\Controllers\Web;

use Illuminate\Http\Request;
use Dentist\Medicine;
use Dentist\Http\Controllers\Controller;

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
        return view('medicine.form_create', compact('data'));
    }
    /**
     * Store a new Medicine
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request){
        $medicine = new Medicine();
        
        $medicine->generic_name = $request->generic_name;
        $medicine->manufacturer_name = $request->manufacturer_name;
        $medicine->manufacturer = $request->manufacturer;
       
        $medicine->save();

        return redirect()->route('medicine.index');
    }
    /**
     * edit the Medicine
     * @var Request $request
     * @return JsonResponse
     */
    public function edit(Request $request, $id)
    {
        $medicine = Medicine::find($id);
        return view('medicine.form_update', compact('medicine'));
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
        $medicine->delete();
        $medicine->deleted = true;
        return redirect()->route('medicine.index')->with('status', 'Medicamento deletado com sucesso!');
    }
}
