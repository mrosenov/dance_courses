<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rules;
use Monarobase\CountryList\CountryListFacade;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $countries = CountryListFacade::getList('en');
        return view('auth.register',[
            'countries' => $countries,
        ]);
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'country' => ['required'],
            'town' => ['required'],
            'address' => ['required', 'string'],
            'postcode' => ['required', 'integer'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'birthday' => ['required'],
            'phone' => ['required'],
            'contactperson' => ['required', 'string'],
            'contactpersonphone' => ['required', 'string']
        ]);

        if (DB::table('users')->where('phone', $request->phone)->exists()) {
            return redirect::back()->withInput()->with('error','Account with such phone number already exists');
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'country' => $request->country,
            'town' => $request->town,
            'address' => $request->address,
            'postcode' => $request->postcode,
            'password' => Hash::make($request->password),
            'birthday' => $request->birthday,
            'phone' => $request->phone,
            'contactperson' => $request->contactperson,
            'contactpersonphone' => $request->contactpersonphone,
        ]);



        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
