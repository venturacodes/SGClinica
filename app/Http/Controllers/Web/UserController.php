<?php

namespace App\Http\Controllers\Web;

use App\Http\Middleware\CheckCustomDentistAuth;
use App\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
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
        if (User::where('email', $email)->exists()) {
            $user = User::where('email', $email)->first();
            if (Hash::check($password, $user->password)) {
                return new JsonResponse(User::where('email', $email)->first());
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
            'email' => 'required|unique'
        ]);
        if (User::where('email', '=', $request->email)->exists()) {
            return new JsonResponse(['message'=> 'Usuário já cadastrado com este e-mail.']);
        }
        
        User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return new JsonResponse($User);
    }
    /**
     * Updates the User
     * @var Request $request
     * @return JsonResponse
     */
    public function update(Request $request, User $user)
    {

        $user->email = $data['email'];
        $user->password = Hash::make($data['password']);
        $user->role_id = $data['role_id'];

        $user->save();

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
