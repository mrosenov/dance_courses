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
            <form>
                <div class="form-group">
                    <label for="SiteName">Site name</label>
                    <input type="text" name="sitename" class="form-control rounded-0" id="SiteName" placeholder="Site Name" value="{{ $settings->name }}">
                </div>

                <div class="form-group">
                    <label for="SiteCountry">Country</label>
                    <select name="country" class="form-control rounded-0" id="SiteCountry">
                        @foreach($countries as $country)
                            <option value="{{$country}}" @if($country === $settings->country) selected @endif>{{$country}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="SiteTown">Town</label>
                    <input type="text" name="sitetown" class="form-control rounded-0" id="SiteTown" placeholder="Site Town" value="{{ $settings->town }}">
                </div>

                <div class="form-group">
                    <label for="SitePostCode">Post Code</label>
                    <input type="text" name="sitepostcode" class="form-control rounded-0" id="SitePostCode" placeholder="Post Code" value="{{ $settings->postcode }}">
                </div>

                <div class="form-group">
                    <label for="SiteAddress">Address</label>
                    <input type="text" name="siteaddress" class="form-control rounded-0" id="SiteAddress" placeholder="Address" value="{{ $settings->address }}">
                </div>

                <div class="form-group">
                    <label for="SiteEmail">Email</label>
                    <input type="text" name="siteemail" class="form-control rounded-0" id="SiteEmail" placeholder="Site Email" value="{{ $settings->email }}">
                </div>

                <div class="form-group">
                    <label for="SiteVAT">VAT ID</label>
                    <input type="text" name="sitevatid" class="form-control rounded-0" id="SiteVAT" placeholder="Site Vat ID" value="{{ $settings->VATNumber }}">
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <i class="fa-brands fa-youtube"></i>
                        </div>
                    </div>
                    <input type="text" name="siteyoutube" class="form-control rounded-0" placeholder="Link to youtube channel" value="{{ $settings->youtube }}">
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <i class="fa-brands fa-facebook"></i>
                        </div>
                    </div>
                    <input type="text" name="sitefacebook" class="form-control rounded-0" placeholder="Link to facebook page" value="{{ $settings->facebook }}">
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <i class="fa-brands fa-instagram"></i>
                        </div>
                    </div>
                    <input type="text" name="siteinstagram" class="form-control rounded-0" placeholder="Link to instagram page" value="{{ $settings->instagram }}">
                </div>

                <div class="form-footer">
                    <button type="submit" class="btn btn-success w-100">Save</button>
                </div>

            </form>
        </div>
    </div>
@endsection
