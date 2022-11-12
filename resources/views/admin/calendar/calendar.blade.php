@extends('admin.layouts.default_admin')

@section('section')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-light">
            <li class="breadcrumb-item"><a href="{{route('admin')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('calendar')}}">Calendar</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{$semester->name}}</li>
        </ol>
    </nav>
    <div class="card card-default">
        <div class="card-body">
            <div class="col-lg-12">
                <div class="form-group">
                    <select class="js-example-basic-multiple form-control" onchange="window.location.href=''+this.value">
                        <option disabled selected>Choose Semester</option>
                        @foreach($semesters as $semesterList)
                            <option value="{{$semesterList->id}}" @if($semester->id == $semesterList->id) selected @endif>{{$semesterList->name}} {{ ($semesterList->id == $currentSemester->id) ? '[Current Semester]' : '' }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            @foreach($studios as $studio)
            <div class="col-lg-12">
                <table class="table table-striped table-bordered mt-1 mb-1">
                    <thead>
                    <tr>
                        <th colspan="5" style="text-align: center; vertical-align: middle;">{{$studio->name}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>

                    </tr>
                    </tbody>
                </table>
                <table class="table table-striped table-bordered" style="width: 300.2px; display: inline-table;">
                    <thead>
                    <tr>
                        <th colspan="5" style="text-align: center; vertical-align: middle;">Monday</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($studio->SemesterCourses as $course)
                            @if($course->weekday == "Monday")
                                <tr>
                                    <td style="text-align: center; vertical-align: middle;">
                                        <p class="text-dark font-weight-medium">Teacher: {{$course->Course->Teacher->UserInfo->name}}</p>
                                        <p class="text-dark font-weight-medium">Course: {{$course->Course->name}}</p>
                                        <p class="text-dark font-weight-medium">Age Group: {{$course->Course->AgeGroup->name}}</p>
                                        <p class="text-dark font-weight-medium">Duration: {{$course->Course->course_start}} - {{$course->Course->course_end}}</p>
                                        <p class="text-dark font-weight-medium">Students: 1</p>
                                        <a href="{{route('course', $course->Course->id)}}" class="btn btn-sm btn-success w-100">View Course</a>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
                <table class="table table-striped table-bordered" style="width: 300.2px; display: inline-table;">
                    <thead>
                    <tr>
                        <th colspan="5" style="text-align: center; vertical-align: middle;">Tuesday</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($studio->SemesterCourses as $course)
                        @if($course->weekday == "Tuesday")
                            <tr>
                                <td style="text-align: center; vertical-align: middle;">
                                    <p class="text-dark font-weight-medium">Teacher: {{$course->Course->Teacher->UserInfo->name}}</p>
                                    <p class="text-dark font-weight-medium">Course: {{$course->Course->name}}</p>
                                    <p class="text-dark font-weight-medium">Age Group: {{$course->Course->AgeGroup->name}}</p>
                                    <p class="text-dark font-weight-medium">Duration: {{$course->Course->course_start}} - {{$course->Course->course_end}}</p>
                                    <p class="text-dark font-weight-medium">Students: 1</p>
                                    <a href="{{route('course', $course->Course->id)}}" class="btn btn-sm btn-success w-100">View Course</a>
                                </td>

                            </tr>
                        @endif
                    @endforeach
                    </tbody>
                </table>
                <table class="table table-striped table-bordered" style="width: 300.2px; display: inline-table;">
                    <thead>
                    <tr>
                        <th colspan="5" style="text-align: center; vertical-align: middle;">Wednesday</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($studio->SemesterCourses as $course)
                        @if($course->weekday == "Wednesday")
                            <tr>
                                <td style="text-align: center; vertical-align: middle;">
                                    <p class="text-dark font-weight-medium">Teacher: {{$course->Course->Teacher->UserInfo->name}}</p>
                                    <p class="text-dark font-weight-medium">Course: {{$course->Course->name}}</p>
                                    <p class="text-dark font-weight-medium">Age Group: {{$course->Course->AgeGroup->name}}</p>
                                    <p class="text-dark font-weight-medium">Duration: {{$course->Course->course_start}} - {{$course->Course->course_end}}</p>
                                    <p class="text-dark font-weight-medium">Students: 1</p>
                                    <a href="{{route('course', $course->Course->id)}}" class="btn btn-sm btn-success w-100">View Course</a>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                    </tbody>
                </table>
                <table class="table table-striped table-bordered" style="width: 300.2px; display: inline-table;">
                    <thead>
                    <tr>
                        <th colspan="5" style="text-align: center; vertical-align: middle;">Thursday</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($studio->SemesterCourses as $course)
                        @if($course->weekday == "Thursday")
                            <tr>
                                <td style="text-align: center; vertical-align: middle;">
                                    <p class="text-dark font-weight-medium">Teacher: {{$course->Course->Teacher->UserInfo->name}}</p>
                                    <p class="text-dark font-weight-medium">Course: {{$course->Course->name}}</p>
                                    <p class="text-dark font-weight-medium">Age Group: {{$course->Course->AgeGroup->name}}</p>
                                    <p class="text-dark font-weight-medium">Duration: {{$course->Course->course_start}} - {{$course->Course->course_end}}</p>
                                    <p class="text-dark font-weight-medium">Students: 1</p>
                                    <a href="{{route('course', $course->Course->id)}}" class="btn btn-sm btn-success w-100">View Course</a>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                    </tbody>
                </table>
                <table class="table table-striped table-bordered" style="width: 286px; display: inline-table;">
                    <thead>
                    <tr>
                        <th colspan="5" style="text-align: center; vertical-align: middle;">Friday</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($studio->SemesterCourses as $course)
                        @if($course->weekday == "Friday")
                            <tr>
                                <td style="text-align: center; vertical-align: middle;">
                                    <p class="text-dark font-weight-medium">Teacher: {{$course->Course->Teacher->UserInfo->name}}</p>
                                    <p class="text-dark font-weight-medium">Course: {{$course->Course->name}}</p>
                                    <p class="text-dark font-weight-medium">Age Group: {{$course->Course->AgeGroup->name}}</p>
                                    <p class="text-dark font-weight-medium">Duration: {{$course->Course->course_start}} - {{$course->Course->course_end}}</p>
                                    <p class="text-dark font-weight-medium">Students: 1</p>
                                    <a href="{{route('course', $course->Course->id)}}" class="btn btn-sm btn-success w-100">View Course</a>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                    </tbody>
                </table>
            </div>
            @endforeach
        </div>
    </div>
@endsection
