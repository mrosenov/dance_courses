@extends('admin.layouts.default_admin')

@section('section')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-light">
            <li class="breadcrumb-item"><a href="{{route('admin')}}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Semesters</li>
        </ol>
    </nav>
    <div class="card card-default">
        <div class="card-header">
            <h2>List of all semesters</h2>
        </div>

        <div class="card-body">

            <table class="table table-bordered table-striped table-hover mb-5" style="text-align: center;">
                <thead>
                <tr>
                    <th scope="col" colspan="4">Semester Information</th>
                </tr>
                <tr>
                    <th scope="col" colspan="4">Time Now: {{date("Y/m/d H:i:s")}}</th>
                </tr>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Semester Name</th>
                    <th scope="col">Semester Start</th>
                    <th scope="col">Semester End</th>
                </tr>
                </thead>
                <tbody>
                @if($prev)
                <tr>
                    <td scope="row" style="vertical-align: middle">Previous Semester</td>
                    <td style="vertical-align: middle">{{$prev->name}}</td>
                    <td style="vertical-align: middle">{{$prev->semester_start}}</td>
                    <td style="vertical-align: middle">{{$prev->semester_end}}</td>
                </tr>
                @endif
                @if($current)
                <tr>
                    <td scope="row" style="vertical-align: middle">Current Semester</td>
                    <td style="vertical-align: middle">{{$current->name}}</td>
                    <td style="vertical-align: middle">{{$current->semester_start}}</td>
                    <td style="vertical-align: middle">{{$current->semester_end}}</td>
                </tr>
                @endif
                @if($next)
                <tr>
                    <td scope="row" style="vertical-align: middle">Next Semester</td>
                    <td style="vertical-align: middle">{{$next->name}}</td>
                    <td style="vertical-align: middle">{{$next->semester_start}}</td>
                    <td style="vertical-align: middle">{{$next->semester_end}}</td>
                </tr>
                @endif
                </tbody>
            </table>


            <hr>
            <a href="{{route('add-semester')}}" class="btn btn-sm btn-success mb-2">Add new semester</a>
            <table class="table table-striped table-bordered mb-2" style="text-align: center;">
                <thead>
                    <tr>
                        <th scope="col" colspan="6">List of semesters</th>
                    </tr>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Semester Name</th>
                        <th scope="col">Semester Start</th>
                        <th scope="col">Semester End</th>
                        <th scope="col">Active</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($semesters as $semester)
                    <tr class="{{($current->id == $semester->id) ? 'table-success' : ''}}">
                        <td scope="row" style="vertical-align: middle">{{$semester->id}}</td>
                        <td style="vertical-align: middle"><a href="{{route('semester', $semester->id)}}">{{$semester->name}}</a></td>
                        <td style="vertical-align: middle">{{$semester->semester_start}}</td>
                        <td style="vertical-align: middle">{{$semester->semester_end}}</td>
                        <td style="vertical-align: middle">{{$semester->active ? 'Active' : 'Not Active'}} </td>
                        <th class="text-center">
                            <a href="{{route('semester', $semester->id)}}" class="btn btn-sm btn-outline-smoke">
                                <i class="fa-duotone fa-building"></i>
                            </a>
                            <a href="{{route('edit-semester', $semester->id)}}" class="btn btn-sm btn-outline-smoke">
                                <i class="fa-duotone fa-pen-to-square"></i>
                            </a>
                            <a href="{{route('delete-semester', $semester->id)}}" class="btn btn-sm btn-outline-smoke">
                                <i class="fa-duotone fa-trash"></i>
                            </a>
                        </th>

                    </tr>
                @endforeach
                </tbody>
            </table>
            {{$semesters->links()}}
        </div>

    </div>

@endsection
