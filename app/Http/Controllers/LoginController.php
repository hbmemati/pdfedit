<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function login(Request $request)
    {
        if (Auth::check())
            return redirect()->route('index');

        return view('login');
    }

    public function login_(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ], [
            'email.required' => 'Email boş girilemez !',
            'password.required' => 'Şifre boş girilemez !'
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'active' => true])) {
            return redirect()->route('index');
        } else
            return redirect()->route('login.index')->withErrors('Yanlış Kullanıcı Adı veya Şifre');
    }

    public function register(Request $request)
    {
        if (Auth::check())
            return redirect()->route('index');

        return view('register');
    }

    public function register_(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required',
            'password' => 'required',
            'name' => 'required',
            'check'=>'required',
        ], [
            'email.required' => 'Email boş girilemez !',
            'name.required' => 'İsim boş girilemez !',
            'password.required' => 'Şifre boş girilemez !',
             'check.required' => 'Kullanım koşulları kabul edilmelidir !'
        ]);
       $user= User::create([
            'name'=>$request->input('name'),
            'email'=>$request->input('email'),
            'password'=>bcrypt($request->input('password'),),

        ]);

        return redirect()->route('login.index')->withErrors(['Üyeliğiniz oluşturuldu.', 'Üyeliğiniz pasif, lütfen yöneticiden aktif etmesini isteyin !']);
    }
    public function active(Request $request)
    {
        $user = User::find($request->input('id'));
        $user->active = true;
        $user->save();
        return redirect()->route('index');
    }
    public function passive(Request $request)
    {
        $user = User::find($request->input('id'));
        $user->active = false;
        $user->save();
        return redirect()->route('index');
    }
    public function delete(Request $request)
    {
        $user = User::find($request->input('id'));
        $user->delete();
        return redirect()->route('index');
    }
}
