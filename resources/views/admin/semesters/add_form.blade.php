@extends('admin.layouts.default_admin')

@section('section')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-light">
            <li class="breadcrumb-item"><a href="{{route('admin')}}">Home</a></li>
            <li class="breadcrumb-item" aria-current="page"><a href="{{route('semesters')}}">List of Semesters</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add Semester</li>
        </ol>
    </nav>
    <div class="card card-default">
        <div class="card-body">
            <form method="POST" action="{{route('store-semester')}}">
                @csrf
                <div class="form-group">
                    <label for="Name">Name</label>
                    <input name="name" type="text" class="form-control" id="Name" placeholder="Name" required>
                </div>

                <label>Semester Start</label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text mdi mdi-calendar"></span>
                    </div>
                    <input name="semester_start" type="datetime-local" class="form-control" data-mask="00/00/0000" required>
                </div>

                <label>Semester End</label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text mdi mdi-calendar"></span>
                    </div>
                    <input name="semester_end" type="datetime-local" class="form-control" data-mask="00/00/0000" required>
                </div>

                <fieldset class="border p-2">
                    <legend class="float-none w-auto p-2" style="color: #31343d;font-size: 15px;font-weight: 600;display: inline-block;margin-bottom: 0.5rem;">Additional Options</legend>
                    <div class="custom-control custom-checkbox d-inline-block">
                        <input name="active" type="checkbox" class="custom-control-input" id="Active" value="1">
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
