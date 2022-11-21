@extends('admin.layouts.default_admin')

@section('section')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-light">
            <li class="breadcrumb-item"><a href="{{route('admin')}}">Home</a></li>
            <li class="breadcrumb-item" aria-current="page"><a href="{{route('holidays')}}">Holidays</a></li>
            <li class="breadcrumb-item active">{{ $semester->name }}</li>
        </ol>
    </nav>
    <div class="card card-default">
        <div class="card-body">
            <select class="js-example-basic-single form-control" onchange="window.location.href=''+this.value">
                <option disabled selected>Choose Semester</option>
                @foreach($semesters as $sm)
                    <option value="{{$sm->id}}">{{$sm->name}} {{ ($sm->id == $currentSemester->id) ? '[Current Semester]' : '' }}</option>
                @endforeach
            </select>
            <a href="{{route('add-holiday',$semester->id)}}" class="btn btn-sm btn-success mb-2 mt-2">Add new holiday</a>
            <table class="table table-striped table-bordered" style="text-align: center;">
                <thead>
                <tr>
                    <th scope="col" colspan="5">Holidays For {{ $semester->name }}</th>
                </tr>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th class="text-center">Date</th>
                    <th class="text-center">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($semester->Holidays as $holiday)
                <tr>
                    <td style="vertical-align: middle; text-align: center;">{{ $holiday->id }}</td>
                    <td style="vertical-align: middle; text-align: center;"><a href="#">{{ $holiday->name }}</a></td>
                    <td style="vertical-align: middle; text-align: center;">{{ $holiday->description }}</td>
                    <td style="vertical-align: middle; text-align: center;">{{ $holiday->holiday_from }} - {{ $holiday->holiday_to }}</td>
                    <td class="text-center">
                        <a href="#" class="btn btn-sm btn-outline-smoke">
                            <i class="fa-duotone fa-pen-to-square"></i>
                        </a>
                        <a href="#" class="btn btn-sm btn-outline-smoke">
                            <i class="fa-duotone fa-trash"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
