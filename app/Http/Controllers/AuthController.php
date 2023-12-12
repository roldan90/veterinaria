<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login() {
        return view('login');
    }

    public function logear(Request $request) {
        $credenciales = $request->only("name", "password");
        if (Auth::attempt($credenciales)) {
            return redirect()->route('clientes-index');
        }
    }

    public function logout(){
        Auth::logout();
        Session::flush();
        return redirect()->route('login');
    }

    public function nuevoUsuario(){
        $item = new User();
        $item->name = 'usuario';
        $item->email = 'veterinaria@gmail.com';
        $item->password = Hash::make('12345');
        $item->save();
        return $item;
    }
}
