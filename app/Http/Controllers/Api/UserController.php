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
     * Show a user by it's email and password.
     * @param string $email
     * @param string $password
     * @return JsonResponse
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
        $User = new User();
        if (User::where('email', '=', $request->email)->exists()) {
            return new JsonResponse(['message'=> 'Usuário já cadastrado com este e-mail.']);
        }
        $User->prepare($request);
        $User->save();

        return new JsonResponse($User);
    }
}
