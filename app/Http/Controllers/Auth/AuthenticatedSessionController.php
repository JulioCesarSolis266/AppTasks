<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class AuthenticatedSessionController extends Controller
{
    /**
     * Handle an incoming authentication request.
     *
     * @param Request $request //esto sirve para que el usuario se autentique
     * @return RedirectResponse //devuelve una respuesta de que se autentico
     * @throws ValidationException //si no se autentica devuelve una excepcion
     *
     *
    */

    public function login(Request $request)
    {

        $response = [
            'status' => 401,
            'message' => 'Unauthorized',
            'data' => null
        ];



        $user = User::where('email', $request->email)->first();

        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                // $employee = $user->employee; // Suponiendo que existe una relación entre User y Employee.

                // if ($employee) {
                //     $user->employeeId = $employee->id;
                //     $user->save();
                // }

                $token = $user->createToken("example");

                $response = [
                    'status' => 200,
                    'message' => 'Login Success',
                    'data' => $user,
                    'token' => $token->plainTextToken
                ];
            } else {
                $response = [
                    'status' => 401,
                    'message' => 'Incorrect Password',
                    'data' => null
                ];
            }
        } else {
            $response = [
                'status' => 401,
                'message' => 'Email not registered',
                'data' => null
            ];
        }

        return response()->json($response, $response['status']);
    }

}



