@extends('layouts.default_noslider')

@section('register_section')
    <div class="login-register-page-wrapper edu-section-gap bg-color-white">
        <div class="container checkout-page-style">
            <div class="row g-5">
                <div class="col-lg-12">
                    <div class="login-form-box">
                        <h3 class="mb-30">Register</h3>
                        @include('alerts')
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        <x-input-error :messages="$errors->get('email')" class="alert alert-danger mt-2" />
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
                                <input type="text" name="contactperson" value="{{old('contactperson')}}" placeholder="Contact Person" required />
                            </div>
                            <div class="input-box mb--30">
                                <input type="number" name="contactpersonphone" value="{{old('contactpersonphone')}}" placeholder="Contact Person Phone" required />
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
