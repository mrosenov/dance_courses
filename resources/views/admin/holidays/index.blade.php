@extends('admin.layouts.default_admin')

@section('section')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-light">
            <li class="breadcrumb-item"><a href="{{route('admin')}}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Holidays</li>
        </ol>
    </nav>
    <div class="card card-default">
        <div class="card-body">
            <div class="form-group">
                <select class="js-example-basic-single form-control" onchange="window.location.href='holidays/semester/'+this.value">
                    <option disabled selected>Choose Semester</option>
                    @foreach($semesters as $semester)
                        <option value="{{$semester->id}}">{{$semester->name}} {{ ($semester->id == $currentSemester->id) ? '[Current Semester]' : '' }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
@endsection
