<?php

namespace Dentist\Http\Controllers\Api;

use Dentist\Http\Middleware\CheckCustomDentistAuth;
use Dentist\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Dentist\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }
    /**
     * Show all users.
     *  @return JsonResponse
     */
    public function index(Request $request)
    {
        return new JsonResponse(User::all());
    }
    /**
     * Show a user by it's email.
     *  @return JsonResponse
     */
    public function show($email, $password)
    {

        if(User::where('email',$email)->exists()) {
            $user = User::where('email',$email)->first();
            if(Hash::check($password, $user->password)){
                return new JsonResponse(User::where('email',$email)->first());
            }
            abort(404);

        }
        abort(404);

    }
    /**
     * Creates a new User
     * @var Request $request
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'email'=>'required|email',
        ]);

        $User = new User();

        $User->email = $request->email;
        $User->password = $request->password;

        $User->save();

        return new JsonResponse($User);
    }
    /**
     * Updates the User
     * @var Request $request
     * @return JsonResponse
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'email'=>'required|email',
        ]);
        $User = User::find($id);

        $this->validate($request, [
            'email' => 'required|max:255',
            'password' => 'required',
        ]);


        $User->email = $request->email;
        $User->password = $request->password;

        $User->save();

        return new JsonResponse($User);
    }
    /**
     * Removes a user by it's id
     *
     * @return JsonResponse
     */
    public function delete($id)
    {
        $User = User::find($id);
        $User->delete();
        $User->deleted = true;

        return new JsonResponse($User);
    }
}
