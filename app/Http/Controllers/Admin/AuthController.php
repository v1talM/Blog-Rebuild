<?php
/**
 * Created by PhpStorm.
 * User: vital
 * Date: 18-11-4
 * Time: 下午12:21
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class AuthController extends Controller
{
    public function auth(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $auth = Auth::attempt($credentials);
        if ($auth) {
            return response()->json(['auth' => true]);
        }
        return response()->json(['auth' => false]);
    }

    public function login()
    {
        return view('login');
    }
}