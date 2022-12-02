@extends('admin.layouts.default_admin')

@section('section')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-light">
            <li class="breadcrumb-item"><a href="{{route('admin')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('semesters')}}">List of Semesters</a></li>
            <li class="breadcrumb-item"><a href="{{route('semester', $studio->Semester->id)}}">{{$studio->Semester->name}}</a></li>
            <li class="breadcrumb-item"><a href="{{route('studio', [$studio->Semester->id,$studio->id])}}">{{$studio->name}}</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add Course</li>
        </ol>
    </nav>
    <div class="card card-default">
        <div class="card-body">
            <form method="POST" action="{{route('store-course', [$studio->Semester->id,$studio->id])}}">
                @csrf
                <fieldset class="border p-2">
                    <legend class="float-none w-auto p-2" style="color: #31343d;font-size: 15px;font-weight: 600;display: inline-block;margin-bottom: 0.5rem;">Course Info</legend>

                    <div class="form-group">
                        <label for="Name">Name</label>
                        <input name="course_name" type="text" class="form-control" id="Name" placeholder="Name" required>
                    </div>

                    <div class="form-group">
                        <label for="Description">Description</label>
                        <textarea name="course_description" id="summernote"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="dance_styles">Dance Style</label>
                        <select class="form-control" id="dance_styles" name="dance_style">
                            @foreach($dances as $dance)
                                <option value="{{$dance->id}}">{{$dance->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="course_teacher">Teacher</label>
                        <select class="form-control" id="course_teacher" name="course_teacher">
                            @foreach($teachers as $teacher)
                                <option value="{{$teacher->id}}">{{$teacher->UserInfo->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="course_ageGroup">Age Group</label>
                        <select class="form-control" id="course_ageGroup" name="course_ageGroup">
                            @foreach($AgeGroups as $AgeGroup)
                                <option value="{{$AgeGroup->id}}">{{$AgeGroup->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="course_level">Course Level</label>
                        <input name="course_level" type="number" class="form-control" id="course_level" placeholder="Course Level" required>
                    </div>

                    <div class="form-group">
                        <label for="course_places">Course Free Places</label>
                        <input name="course_places" type="number" class="form-control" id="course_places" placeholder="Course Free Places" required>
                    </div>

                    <div class="form-group">
                        <label for="course_price">Course Price</label>
                        <input name="course_price" type="number" class="form-control" id="course_price" placeholder="Course Price" step="0.01" required>
                    </div>

                    <div class="form-group">
                        <label for="course_weekday">Weekday</label>
                        <select class="form-control" id="course_weekday" name="course_weekday">
                            <option value="Monday">Monday</option>
                            <option value="Tuesday">Tuesday</option>
                            <option value="Wednesday">Wednesday</option>
                            <option value="Thursday">Thursday</option>
                            <option value="Friday">Friday</option>
                        </select>
                    </div>
                </fieldset>

                <fieldset class="border p-2">
                    <legend class="float-none w-auto p-2" style="color: #31343d;font-size: 15px;font-weight: 600;display: inline-block;margin-bottom: 0.5rem;">Course Times</legend>

                    <div class="form-group">
                        <label for="course_places">Course Begins</label>
                        <input type="time" class="form-control" name="course_start" required>
                    </div>

                    <div class="form-group">
                        <label for="course_places">Course Ends</label>
                        <input type="time" class="form-control" name="course_end" required>
                    </div>
                </fieldset>

                <fieldset class="border p-2">
                    <legend class="float-none w-auto p-2" style="color: #31343d;font-size: 15px;font-weight: 600;display: inline-block;margin-bottom: 0.5rem;">Registration Times</legend>

                    <div class="form-group">
                        <label for="course_places">Course Registration Begins</label>
                        <input type="datetime-local" class="form-control" name="registration_start" required>
                    </div>

                    <div class="form-group">
                        <label for="course_places">Course Registration Ends</label>
                        <input type="datetime-local" class="form-control" name="registration_end" required>
                    </div>
                </fieldset>

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
