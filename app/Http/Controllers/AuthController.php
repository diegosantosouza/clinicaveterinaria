<?php

namespace App\Http\Controllers;

use App\Anamnese;
use App\Animal;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    public function dashboard()
    {

            $anamneses = Anamnese::select('id', 'valor', 'created_at', 'id_animal', 'local')->with(['animalAnamnese', 'tutorAnamnese'])->latest()->take(50)->get();
            $animal = Animal::select('especie', 'sexo')->get();
            return view('admin.dashboard', ['anamneses'=>$anamneses, 'animal'=>$animal]);

    }

    public function showLoginForm()
    {
        if (Auth::check() === true) {
            return redirect()->route('admin');
        }
        return view('admin.formLogin');
    }

//    public function login(Request $request)
//    {
//
//        $credentials = [
//            'email' => $request->email,
//            'password' => $request->password
//        ];
//
//        if (Auth::attempt($credentials)){
//            return redirect()->route('admin');
//        }
//
//        return redirect()->back()->withInput()->withErrors(['Dados inválidos']);
//    }

    public function login(Request $request)
    {

        if (in_array('', $request->only('email', 'password'))) {
            $json['message'] = $this->message->error('Informe todos os dados para efetuar o login')->render();
            return response()->json($json);
        }

        if(!filter_var($request->email, FILTER_VALIDATE_EMAIL)) {
            $json['message'] = $this->message->error('Informe um e-mail válido')->render();
            return response()->json($json);
        }

        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if(Auth::attempt($credentials)) {
            $json['redirect'] = route('admin');
            return response()->json($json);
        }

        if(!Auth::attempt($credentials)) {
            $json['message'] = $this->message->error('Usuário e senha não conferem')->render();
            return response()->json($json);
        }

//        $this->authenticated($request->getClientIp());

    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin');
    }
}
