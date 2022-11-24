@extends('admin.layouts.default_admin')

@section('section')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-light">
            <li class="breadcrumb-item"><a href="{{route('admin')}}">Home</a></li>
            <li class="breadcrumb-item" aria-current="page"><a href="{{route('dance-styles')}}">Dance Styles</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add Dance Style</li>
        </ol>
    </nav>
    <div class="card card-default">
        <div class="card-body">
            <form method="POST" action="{{route('edit-dance-styles-form', $style->id)}}">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label for="Name">Name</label>
                    <input name="name" type="text" class="form-control" id="Name" placeholder="Name" value="{{$style->name}}" required>
                </div>
                <div class="form-group">
                    <label for="Description">Description</label>
                    <textarea name="description" id="summernote">{{$style->description}}</textarea>
                </div>

                <fieldset class="border p-2">
                    <legend class="float-none w-auto p-2" style="color: #31343d;font-size: 15px;font-weight: 600;display: inline-block;margin-bottom: 0.5rem;">Additional Options</legend>
                    <div class="custom-control custom-checkbox d-inline-block">
                        <input name="active" type="checkbox" class="custom-control-input" id="DanceActive" value="1" @if($style->active) checked @endif>
                        <label class="custom-control-label" for="DanceActive">Active</label>
                    </div>

                </fieldset>
                <div class="form-footer mt-6">
                    <button type="submit" class="btn btn-success w-100">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
