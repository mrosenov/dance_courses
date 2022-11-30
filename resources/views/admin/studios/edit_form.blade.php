@extends('admin.layouts.default_admin')

@section('section')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-light">
            <li class="breadcrumb-item"><a href="{{route('admin')}}">Home</a></li>
            <li class="breadcrumb-item" aria-current="page"><a href="{{route('semesters')}}">List of Semesters</a></li>
            <li class="breadcrumb-item" aria-current="page"><a href="{{route('semester', $semester->id)}}">{{$semester->name}}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{$studio->name}}</li>
        </ol>
    </nav>
    <div class="card card-default">
        <div class="card-body">
            <form method="POST" action="{{route('update-studio', [$semester->id, $studio->id])}}">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label for="Name">Name</label>
                    <input name="name" type="text" class="form-control" id="Name" placeholder="Name" value="{{$studio->name}}" required>
                </div>

                <div class="form-group">
                    <label for="Semesters">Semester</label>
                    <select class="form-control" id="Semesters" name="semester">
                        @foreach($semesters as $semesterarr)
                        <option value="{{$semesterarr->id}}" @if($semesterarr->id == $semester->id) selected @endif>{{$semesterarr->name}}</option>
                        @endforeach
                    </select>
                </div>

                <fieldset class="border p-2">
                    <legend class="float-none w-auto p-2" style="color: #31343d;font-size: 15px;font-weight: 600;display: inline-block;margin-bottom: 0.5rem;">Additional Options</legend>
                    <div class="custom-control custom-checkbox d-inline-block">
                        <input name="active" type="checkbox" class="custom-control-input" id="Active" value="1" @if($studio->active) checked @endif>
                        <label class="custom-control-label" for="Active">Active</label>
                    </div>
                </fieldset>
                <div class="form-footer mt-6">
                    <button type="submit" class="btn btn-success w-100">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
