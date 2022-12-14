@extends('layouts.default_noslider')

@section('login_section')
    <div class="edu-breadcrumb-area breadcrumb-style-1 ptb--60 ptb_md--40 ptb_sm--40 bg-image">
        <div class="container eduvibe-animated-shape">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-inner text-start">
                        <div class="page-title">
                            <h3 class="title" style="text-transform: capitalize">Login - Register</h3>
                        </div>
                        <nav class="edu-breadcrumb-nav" style="text-transform: capitalize">
                            <ol class="edu-breadcrumb d-flex justify-content-start liststyle">
                                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                                <li class="separator"><i class="ri-arrow-drop-right-line"></i></li>
                                <li class="breadcrumb-item active" aria-current="page">Login - Register</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>

            <div class="shape-dot-wrapper shape-wrapper d-xl-block d-none">
                <div class="shape-dot-wrapper shape-wrapper d-xl-block d-none">
                    <div class="shape-image shape-image-1">
                        <img src="{{asset('assets/images/shapes/shape-11-07.png')}}" alt="Shape Thumb" />
                    </div>
                    <div class="shape-image shape-image-2">
                        <img src="{{asset('assets/images/shapes/shape-01-02.png')}}" alt="Shape Thumb" />
                    </div>
                    <div class="shape-image shape-image-3">
                        <img src="{{asset('assets/images/shapes/shape-03.png')}}" alt="Shape Thumb" />
                    </div>
                    <div class="shape-image shape-image-4">
                        <img src="{{asset('assets/images/shapes/shape-13-12.png')}}" alt="Shape Thumb" />
                    </div>
                    <div class="shape-image shape-image-5">
                        <img src="{{asset('assets/images/shapes/shape-36.png')}}" alt="Shape Thumb" />
                    </div>
                    <div class="shape-image shape-image-6">
                        <img src="{{asset('assets/images/shapes/shape-05-07.png')}}" alt="Shape Thumb" />
                    </div>
                </div>
            </div>
        </div>
    </div>

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
                        @include('alerts')
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                        <form method="POST" class="login-form" action="{{ route('register') }}">
                            @csrf
                            <div class="input-box mb--30 @if($errors->get('name')) is-invalid @endif">
                                <input type="text" name="name" value="{{old('name')}}" placeholder="Full Name" required />
                            </div>
                            <div class="input-box mb--30">
                                <label>Birthday</label>
                                <input type="date" name="birthday" value="{{old('birthday')}}" placeholder="Date Of Birth">
                            </div>
                            <div class="input-box mb--30 @if($errors->get('email')) is-invalid @endif">
                                <input type="email" name="email" value="{{old('email')}}" placeholder="Email" required />
                            </div>
                            <div class="input-box mb--30">
                                <select name="country">
                                    @foreach($countries as $country)
                                        <option value="{{$country}}">{{$country}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="input-box mb--30">
                                <input type="text" name="town" value="{{old('town')}}" placeholder="Town" required />
                            </div>
                            <div class="input-box mb--30">
                                <input type="number" name="postcode" value="{{old('postcode')}}" placeholder="Post Code" required />
                            </div>
                            <div class="input-box mb--30">
                                <input type="text" name="address" value="{{old('address')}}" placeholder="Street Address" required />
                            </div>
                            <div class="input-box mb--30 @if($errors->any()) is-invalid @endif">
                                <input type="number" name="phone" value="{{old('phone')}}" placeholder="Student Phone" required />
                            </div>
                            <div class="input-box mb--30">
                                <input type="text" name="contactperson" value="{{old('contactperson')}}" placeholder="Contact Person" />
                            </div>
                            <div class="input-box mb--30">
                                <input type="number" name="contactpersonphone" value="{{old('contactpersonphone')}}" placeholder="Contact Person Phone" />
                            </div>
                            <div class="input-box mb--30 @if($errors->get('password')) is-invalid @endif">
                                <input type="password" name="password" placeholder="Password" required autocomplete="new-password" />
                            </div>
                            <div class="input-box mb--30 @if($errors->get('password')) is-invalid @endif">
                                <input type="password" name="password_confirmation" placeholder="Confirm Password" required />
                            </div>
                            <button class="rn-btn edu-btn w-100 mb--30" type="submit">
                                <span>Register</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
