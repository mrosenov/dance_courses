@extends('admin.layouts.default_admin')

@section('section')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-light">
            <li class="breadcrumb-item active" aria-current="page">Calendar</li>
        </ol>
    </nav>
    <div class="card card-default">
        <div class="card-body">
            <div class="form-group">
                <select class="js-example-basic-single form-control" onchange="window.location.href='calendar/'+this.value">
                    <option disabled selected>None</option>
                    @foreach($semesters as $semester)
                        <option value="{{$semester->id}}">{{$semester->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
@endsection
