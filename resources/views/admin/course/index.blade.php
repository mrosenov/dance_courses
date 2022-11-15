@extends('admin.layouts.default_admin')

@section('section')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-light">
            <li class="breadcrumb-item"><a href="{{route('admin')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('semester', $course->Semester->id)}}">Semester {{$course->Semester->id}}</a></li>
            <li class="breadcrumb-item"><a href="{{route('studio', $course->Studio->id)}}">{{$course->Studio->name}}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{$course->name}}</li>
        </ol>
    </nav>
    <div class="card card-default">
        <div class="card-body">
            <table class="table table-striped table-bordered" style="text-align: center;">
                <thead>
                <tr>
                    <th scope="col" colspan="5">Course Information</th>
                </tr>
                <tr>
                    <th scope="col">Weekday</th>
                    <th scope="col">Studio</th>
                    <th scope="col">Age Group</th>
                    <th class="text-center">Duration</th>
                    <th class="text-center">Level</th>
                </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{$course->weekday}}</td>
                        <td>{{$course->Studio->name}}</td>
                        <td>{{$course->AgeGroup->name}}</td>
                        <td>{{$course->course_start}} - {{$course->course_end}} </td>
                        <td>{{$course->level}}</td>
                    </tr>
                </tbody>
            </table>

            <hr>
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="User ID">
                <div class="input-group-prepend">
                    <button class="btn btn-success" type="button">Add Student</button>
                </div>
            </div>
            <table class="table table-striped table-bordered" style="text-align: center;">
                <thead>
                <tr>
                    <th scope="col" colspan="7">
                        Course Participants
                    </th>
                </tr>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th class="text-center">Age</th>
                    <th class="text-center">Order ID</th>
                    <th class="text-center">Payment Method</th>
                    <th class="text-center">Paid</th>
                    <th class="text-center">Actions</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td style="vertical-align: middle;">1</td>
                    <td style="vertical-align: middle;">Mitko Rosenov</td>
                    <td style="vertical-align: middle;">mitkorosenov@live.com</td>
                    <td style="vertical-align: middle;">24</td>
                    <td style="vertical-align: middle;">1</td>
                    <td style="vertical-align: middle;">PayPal</td>
                    <td style="vertical-align: middle;">
                        <div class="custom-control custom-checkbox d-inline-block">
                            <input type="checkbox" class="custom-control-input" id="isPaid" checked="checked">
                            <label class="custom-control-label" for="isPaid">Paid</label>
                        </div>
                    </td>
                    <td class="text-center">
                        <a href="#" class="btn btn-sm btn-outline-smoke">
                            <i class="fa-duotone fa-pen-to-square"></i>
                        </a>
                        <a href="#" class="btn btn-sm btn-outline-smoke">
                            <i class="fa-duotone fa-trash"></i>
                        </a>
                    </td>
                </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="5">Total Participants: 1/30</td>
                        <td><a href="#">Export Option #1</a></td>
                        <td><a href="#">Export Option #2</a></td>
                        <td><a href="#">Export Option #3</a></td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
@endsection
