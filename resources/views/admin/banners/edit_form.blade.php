@extends('admin.layouts.default_admin')

@section('section')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-light">
            <li class="breadcrumb-item"><a href="{{route('admin')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('banners')}}">Banners</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Banner</li>
        </ol>
    </nav>
    <div class="card card-default">
        <div class="card-body">
            <form method="POST" action="{{route('update-banner', $banner->id)}}" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label for="BannerName">Name</label>
                    <input name="name" type="text" class="form-control" id="BannerName" placeholder="Name" value="{{$banner->name}}" required>
                </div>
                <div class="form-group">
                    <label for="BannerTitle">Title</label>
                    <input name="title" type="text" class="form-control" id="BannerTitle" placeholder="Title" value="{{$banner->title}}" required>
                </div>
                <div class="form-group">
                    <label for="BannerDescription">Short Description</label>
                    <textarea name="short_description" class="form-control" id="BannerDescription" rows="3" required>{{$banner->short_description}}</textarea>
                </div>
                <div class="form-group">
                    <label for="BannerURL">URL</label>
                    <input name="url" type="text" class="form-control" id="BannerURL" placeholder="URL" value="{{$banner->url}}">
                </div>

                <label class="text-dark font-weight-medium" for="BannerActiveFor">Active From</label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text mdi mdi-calendar" id="BannerActiveFor"></span>
                    </div>
                    <input name="active_from" type="datetime-local" class="form-control" data-mask="00/00/0000" value="{{$banner->active_from}}" required>
                </div>
                <label class="text-dark font-weight-medium" for="BannerActiveTo">Active To</label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text mdi mdi-calendar" id="BannerActiveTo"></span>
                    </div>
                    <input name="active_to" type="datetime-local" class="form-control" data-mask="00/00/0000" value="{{$banner->active_to}}" required>
                </div>
                <div class="form-group">
                    <img class="img-fluid img-thumbnail" src="{{asset('storage/' . $banner->file_name)}}">
                </div>
                <div class="form-group">
                    <label for="banner_image">Image</label>
                    <input name="image" type="file" class="form-control-file" id="banner_image" value="{{$banner->file_path}}">
                </div>
                <div class="custom-control custom-checkbox d-inline-block">
                    <input name="active" type="checkbox" class="custom-control-input" id="BannerActive" value="1" @if($banner->active) checked @endif>
                    <label class="custom-control-label" for="BannerActive">Active</label>
                </div>
                <div class="form-footer mt-6">
                    <button type="submit" class="btn btn-success w-100">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
