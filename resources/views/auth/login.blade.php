@extends('layouts.default_noslider')

@section('login_section')
    <div class="login-register-page-wrapper edu-section-gap bg-color-white">
        <div class="container checkout-page-style">
            <div class="row g-5">
                <div class="col-lg-6">
                    <div class="login-form-box">
                        <h3 class="mb-30">Login</h3>
                        <form method="POST" class="login-form" action="{{ route('login') }}">
                            @csrf
                            <div class="input-box mb--30">
                                <input type="text" name="email" placeholder="Email" value="{{old('email')}}" required autofocus />
                            </div>
                            <div class="input-box mb--30">
                                <input type="password" name="password" placeholder="Password" required autocomplete="current-password" />
                            </div>

                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            <div class="comment-form-consent input-box mb--30">
                                <input name="remember" id="checkbox-1" type="checkbox" />
                                <label for="checkbox-1">Remember Me</label>
                            </div>
                            <button class="rn-btn edu-btn w-100 mb--30" type="submit">
                                <span>Login</span>
                            </button>
                            @if (Route::has('password.request'))
                            <div class="input-box">
                                <a href="{{ route('password.request') }}" class="lost-password">Lost your password?</a>
                            </div>
                            @endif
                        </form>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="login-form-box">
                        <h3 class="mb-30">Register</h3>
                        <form method="POST" class="login-form" action="{{ route('register') }}">
                            @csrf
                            <div class="input-box mb--30">
                                <input type="text" name="name" value="{{old('name')}}" placeholder="Full Name" required />
                            </div>
                            <div class="input-box mb--30">
                                <input type="email" name="email" value="{{old('email')}}" placeholder="Email" required />
                            </div>
                            <div class="input-box mb--30">
                                <input type="password" name="password" placeholder="Password" required autocomplete="new-password" />
                            </div>
                            <div class="input-box mb--30">
                                <input type="password" name="password_confirmation" placeholder="Password" required />
                            </div>
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                            <button class="rn-btn edu-btn w-100 mb--30" type="submit">
                                <span>Register</span>
                            </button>
                            {{--                            <div class="input-box">--}}
                            {{--                                <input id="checkbox-2" type="checkbox" />--}}
                            {{--                                <label for="checkbox-2">I read & agree the terms & conditions.</label>--}}
                            {{--                            </div>--}}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
