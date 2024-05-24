<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{

    public function index()
    {
        return view('site.index');
    }
    public function login()
    {
        return view('site.login');
    }
    public function registerView(Request $request)
    {
        return view('site.register', ['msg' => '']);
    }
    public function register(Request $request)
    {
        // dd($request->all());
        $rules = [
            'name' => 'required|min:3|max:40',
            'email' => 'required|email',
            'password' => 'required|min:5'
        ];

        $feedback = [
            'required' => 'O campo :attribute é obrigatorio',
            'name.min' => 'O campo nome deve ter no minimo 3 caracteres',
            'name.max' => 'O campo nome deve ter no máximo 40 caracteres',
            'email.email' => 'É necessario um email válido'
        ];

        $request->validate($rules,$feedback);
        
        $user = new User();
        $user->create($request->all());
        $msg = "Usuario cadastrado com sucesso.";

        return view('site.register', ['msg' => $msg]);
    }

    public function home(){
        return view('app.index');
    }
}
