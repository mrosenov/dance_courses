@extends('admin.layouts.default_admin')

@section('section')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-light">
            <li class="breadcrumb-item"><a href="{{route('admin')}}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Settings</li>
        </ol>
    </nav>

    <div class="card card-default">
        <div class="card-body">
            <form method="POST" action="{{route('update-site')}}" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="form-group">
                    <label for="SiteName">Site name</label>
                    <input type="text" name="sitename" class="form-control rounded-0" id="SiteName" placeholder="Site Name" value="@if(!empty($settings->name)){{ $settings->name }}@endif" required>
                </div>

                <div class="form-group">
                    <label for="SiteCountry">Country</label>
                    <select name="country" class="form-control rounded-0" id="SiteCountry" required>
                        @if(!empty($settings->country))
                            {{$sc = $settings->country}}
                        @else
                            {{$sc = 0}}
                        @endif

                        @foreach($countries as $country)
                            <option value="{{$country}}" @if($country === $sc) selected @endif>{{$country}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="SiteTown">Town</label>
                    <input type="text" name="sitetown" class="form-control rounded-0" id="SiteTown" placeholder="Site Town" value="@if(!empty($settings->town)){{ $settings->town }}@endif" required>
                </div>

                <div class="form-group">
                    <label for="SitePostCode">Post Code</label>
                    <input type="text" name="sitepostcode" class="form-control rounded-0" id="SitePostCode" placeholder="Post Code" value="@if(!empty($settings->postcode)){{ $settings->postcode }}@endif" required>
                </div>

                <div class="form-group">
                    <label for="SiteAddress">Address</label>
                    <input type="text" name="siteaddress" class="form-control rounded-0" id="SiteAddress" placeholder="Address" value="@if(!empty($settings->address)){{ $settings->address }}@endif" required>
                </div>

                <div class="form-group">
                    <label for="SiteEmail">Email</label>
                    <input type="text" name="siteemail" class="form-control rounded-0" id="SiteEmail" placeholder="Site Email" value="@if(!empty($settings->email)){{ $settings->email }}@endif" required>
                </div>

                <div class="form-group">
                    <label for="SiteEmail">Phone</label>
                    <input type="text" name="sitephone" class="form-control rounded-0" id="SitePhone" placeholder="Site Phone" value="@if(!empty($settings->phone)){{ $settings->phone }}@endif" required>
                </div>

                <div class="form-group">
                    <label for="SiteVAT">VAT ID</label>
                    <input type="text" name="sitevatid" class="form-control rounded-0" id="SiteVAT" placeholder="Site Vat ID" value="@if(!empty($settings->VATNumber)){{ $settings->VATNumber }}@endif" required>
                </div>

                <div class="form-group">
                    <label for="SiteLogo">Site Logo</label>
                    <input type="file" name="site_logo" class="form-control-file" id="SiteLogo">
                </div>

                @if(!empty($settings->logo))
                <fieldset class="border p-2 mb-2">
                    <legend class="float-none w-auto p-2" style="color: #31343d;font-size: 15px;font-weight: 600;display: inline-block;margin-bottom: 0.5rem;">Logo Preview</legend>
                    <img src="{{asset($settings->logo)}}">
                </fieldset>
                @endif

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <i class="fa-brands fa-youtube"></i>
                        </div>
                    </div>
                    <input type="text" name="siteyoutube" class="form-control rounded-0" placeholder="Link to youtube channel" value="@if(!empty($settings->youtube)){{ $settings->youtube }}@endif">
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <i class="fa-brands fa-facebook"></i>
                        </div>
                    </div>
                    <input type="text" name="sitefacebook" class="form-control rounded-0" placeholder="Link to facebook page" value="@if(!empty($settings->facebook)){{ $settings->facebook }}@endif">
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <i class="fa-brands fa-instagram"></i>
                        </div>
                    </div>
                    <input type="text" name="siteinstagram" class="form-control rounded-0" placeholder="Link to instagram page" value="@if(!empty($settings->instagram)){{ $settings->instagram }}@endif">
                </div>

                <div class="form-footer">
                    <button type="submit" class="btn btn-success w-100">Save</button>
                </div>

            </form>
        </div>
    </div>
@endsection
