<?php

namespace App\Http\Controllers\Web;

use App\Role;
use App\User;
use App\Clinic;
use Carbon\Carbon;
use App\Collaborator;
use App\Traits\storeUser;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Collaborator\storeCollaboratorRequest;
use App\Http\Requests\Collaborator\updateCollaboratorRequest;

class CollaboratorController extends Controller
{
    use storeUser;
    /**
     * Show all clinic.
     *  @return JsonResponse
     */
    public function index()
    {
        return new JsonResponse(Collaborator::all());
    }
    /**
     * Creates a new clinic
     * @var Request $request
     * @return JsonResponse
     */
    public function create(Request $request)
    {
        return view('collaborator.form')->with('roles',Role::where([
            ['slug','!=','admin'],
            ['slug','!=','unverified']
            ])->get());
    }
    /**
     * Store a new collaborator
     * @var Request $request
     * @return JsonResponse
     */
    public function store(storeCollaboratorRequest $request)
    {
        $user = $this->store_user($request);
        
        Collaborator::create([
            'user_id' => $user->id,
            'name' => $request->name,
            'phone' => $request->phone,
            'clinic_id' => 1,
        ]);
        
        return redirect()->route('collaborator.index')->with('status', 'Funcionário adicionado com sucesso!');
    }
    public function edit(Request $request, Collaborator $collaborator){
        $roles = Role::where([
            ['slug','!=','admin'],
            ['slug','!=','unverified']
            ])->get();
        
        return view('collaborator.form')->with('collaborator', $collaborator)->with('roles', $roles);
    }
    public function update(updateCollaboratorRequest $request, $id)
    {
        $collaborator = Collaborator::findorFail($id);
        $collaborator->name = $request->name;
        $collaborator->phone = $request->phone;

        $collaborator->save();

        $user = User::where('id','=',$collaborator->user_id)->first();
        $user->email = $request->email;
        $user->role_id = $request->role_id;
        if(isset($request->password)){
            $user->password = bcrypt($request->password);
        }
        $user->save();
        
        return redirect()->route('collaborator.index')->with('status', 'Funcionário atualizado com sucesso!');
    }
    public function destroy(Request $request, $id)
    {
        $collaborator = Collaborator::find($id);
        if(isset($collaborator->image)){
            Storage::delete($collaborator->image);
        }
        User::destroy($collaborator->user_id);
        Collaborator::destroy($id);
        return redirect()->route('collaborator.index')->with('status', 'Funcionário excluído com sucesso!');
    }
}
