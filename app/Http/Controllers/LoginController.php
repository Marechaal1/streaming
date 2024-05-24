<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{

    public function index(Request $request){
        $msg ='';
        // dd($request->all());
        if($request->error == 1){
            $msg = 'Login ou senha invalidos.';
        }

        return view('site.login', ['msg'  => $msg]);
    }


    public function login(Request $request )
    {
        $rules = [
            'email' => 'email',
            'password' => 'required'
        ];
        // Mensagens de validação 
        $feedback = [
            'email.email' => 'É necessario um e-mail válido',
            'password.required' => 'O campo de senha é obrigatorio'
        ];
        $request->validate($rules, $feedback);

        $user = new User();

        $userLogin = $request->email;
        $userPassword = $request->password;
        // dd($userLogin, $userPassword);

        $user = $user->where('email', $userLogin)
        ->where('password', $userPassword)
        ->get()
        ->first(); 

        dd($user);

        // if(isset($user->name)){
        //     session_start();
        //     $_SESSION['name'] = $user->name;
        //     dd($_SESSION['name']);
        // }
        
        return redirect()->route('site.login', ['error' => 1]);
    }
}
