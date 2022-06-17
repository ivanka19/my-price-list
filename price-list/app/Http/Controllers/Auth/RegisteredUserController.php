<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

use App\Models\Company; // Підключення Моделі Company (companies table in DB)


class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    
    public function store(Request $request)
    {
        $request->validate([
            'company-name' => 'required|min:2|max:45|regex:/^\S*$/u',
            'user-name' => 'required|min:2|max:45',
            'email' => 'required|email|min:7|max:30',
            'password' => 'required|confirmed|min:6|max:20'
        ]);

        $user = User::create([
            'userName' => $request->input('user-name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);

        $company = Company::create([
            'companyName' => $request->input('company-name'),
            'userId' => User::where('email', $user->email)->first()->userId,
        ]);

        event(new Registered($user));

        Auth::login($user);

        // return redirect()->route('login')->with('success', 'Ваша компанія була успішно зареєстрована. Тепер авторизуйтесь у системі.');


        return redirect(RouteServiceProvider::HOME);
    }
}
