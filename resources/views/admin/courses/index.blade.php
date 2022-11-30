@extends('admin.layouts.default_admin')

@section('section')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-light">
            <li class="breadcrumb-item"><a href="{{route('admin')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('semesters')}}">List of Semesters</a></li>
            <li class="breadcrumb-item"><a href="{{route('semester', $studio->Semester->id)}}">{{$studio->Semester->name}}</a></li>
            <li class="breadcrumb-item"><a href="{{route('studio', [$studio->Semester->id,$studio->id])}}">{{$studio->name}}</a></li>
            <li class="breadcrumb-item active" aria-current="page">Courses</li>
        </ol>
    </nav>
    <div class="card card-default">
        <div class="card-header">
            <h2>List of all courses for {{$studio->name}}</h2>
        </div>
        <div class="card-body">
            <a href="#" class="btn btn-sm btn-success mb-2">Add new course</a>
            <table class="table table-striped table-bordered" style="text-align: center;">
                <thead>
                <tr>
                    <th scope="col" colspan="13">Courses</th>
                </tr>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Course Name</th>
                    <th scope="col">Dance Style</th>
                    <th scope="col">Teacher</th>
                    <th scope="col">Age Group</th>
                    <th scope="col">Level</th>
                    <th scope="col">Places</th>
                    <th scope="col">Duration</th>
                    <th scope="col">Registration</th>
                    <th scope="col">Price</th>
                    <th scope="col">Weekday</th>
                    <th scope="col">Active</th>
                    <th class="text-center">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($courses as $course)
                    <tr>
                        <td scope="row" style="vertical-align: middle">{{$course->id}}</td>
                        <td style="vertical-align: middle"><a href="{{route('course', $course->id)}}">{{$course->name}}</a></td>
                        <td style="vertical-align: middle"><a href="#">{{$course->DanceStyle->name}}</a></td>
                        <td style="vertical-align: middle"><a href="#">{{$course->Teacher->UserInfo->name}}</a></td>
                        <td style="vertical-align: middle"><a href="#">{{$course->AgeGroup->name}}</a></td>
                        <td style="vertical-align: middle">{{$course->level}}</td>
                        <td style="vertical-align: middle">0/{{$course->free_places}}</td>
                        <td style="vertical-align: middle">{{$course->course_start}} <br>-<br> {{$course->course_end}}</td>
                        <td style="vertical-align: middle">{{$course->course_register_start}} <br>-<br> {{$course->course_register_end}}</td>
                        <td style="vertical-align: middle">{{$course->price}}</td>
                        <td style="vertical-align: middle">{{$course->weekday}}</td>
                        <td style="vertical-align: middle">{{ $course->active ? 'Active' : 'Not Active' }}</td>
                        <th class="text-center" style="vertical-align: middle">
                            <a href="{{route('course', $course->id)}}" class="btn btn-sm btn-outline-smoke">
                                <i class="fa-duotone fa-screen-users"></i>
                            </a>
                            <a href="#" class="btn btn-sm btn-outline-smoke">
                                <i class="fa-duotone fa-pen-to-square"></i>
                            </a>
                            <a href="#" class="btn btn-sm btn-outline-smoke">
                                <i class="fa-duotone fa-trash"></i>
                            </a>
                        </th>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
