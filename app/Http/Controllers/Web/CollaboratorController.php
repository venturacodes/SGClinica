<?php

namespace App\Http\Controllers\Web;

use Carbon\Carbon;
use App\Clinic;
use App\Collaborator;
use App\Traits\storeUser;
use App\User;
use App\Role;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

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
        $roles = Role::where([
            ['slug','!=','admin'],
            ['slug','!=','unverified']
            ])->get();
        return view('collaborator.form_create', compact('roles'));
    }
    /**
     * Store a new collaborator
     * @var Request $request
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'      => 'required|max:255',
            'email' =>'required|unique:users',
            'phone'  => 'required',
        ]);
        $collaborator = new Collaborator();
        $user = $this->store_user($request);

        $collaborator->user_id = $user->id;

        $collaborator->name = $request->name;
        $collaborator->phone = $request->phone;
        $collaborator->clinic_id = 1;

        $collaborator->save();

        return redirect()->route('collaborator.index')->with('status', 'Funcionário adicionado com sucesso!');
    }
    public function edit(Request $request, $id){
        $roles = Role::where([
            ['slug','!=','admin'],
            ['slug','!=','unverified']
            ])->get();
        $collaborator = Collaborator::find($id);
        
        return view('collaborator.form_update',compact('collaborator'), compact('roles'));
    }
    public function update(Request $request){
        $this->validate($request, [
            'name'      => 'required|max:255',
            'email' =>'required|unique:users',
            'phone'  => 'required',
        ]);
        $collaborator = Collaborator::find($request->id);

        $collaborator->name = $request->name;
        $collaborator->phone = $request->phone;
        $collaborator->updated_at = Carbon::now();

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
    public function destroy(Request $request)
    {
        $collaborator = Collaborator::find($request->id);
        User::destroy($collaborator->user_id);
        Collaborator::destroy($request->id);
        return redirect()->route('collaborator.index')->with('status', 'Funcionário excluído com sucesso!');
    }
}
