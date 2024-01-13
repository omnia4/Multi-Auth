<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    protected function redirectTo()
    {
        $user = auth()->user();
        if ($user->hasRole('admin')) {
            return '/admin/dashboard';
        } else if ($user->hasRole('client')) {
            return '/client/dashboard';
        }
        return '/home';
    }
    protected function credentials(Request $request)
{
    $field = filter_var($request->get('login'), FILTER_VALIDATE_EMAIL) ? 'email' : 'phone';
    return [
        $field => $request->get('login'),
        'password' => $request->password,
    ];
}
}
