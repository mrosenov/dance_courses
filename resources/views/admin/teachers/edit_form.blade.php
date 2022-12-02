@extends('admin.layouts.default_admin')

@section('section')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-light">
            <li class="breadcrumb-item"><a href="{{route('admin')}}">Home</a></li>
            <li class="breadcrumb-item" aria-current="page"><a href="{{route('teachers')}}">List of Teachers</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{$teacher->name}}</li>
        </ol>
    </nav>
    <div class="card card-default">
        <div class="card-body">
            <form method="POST" action="">
                @csrf
                @method('PATCH')

                <fieldset class="border p-2">
                    <legend class="float-none w-auto p-2" style="color: #31343d;font-size: 15px;font-weight: 600;display: inline-block;margin-bottom: 0.5rem;">User Info</legend>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text mdi mdi-account"></span>
                        </div>
                        <input name="name" type="text" class="form-control" placeholder="Student Name" value="{{$teacher->name}}" required>
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text mdi mdi-email"></span>
                        </div>
                        <input name="email" type="email" class="form-control" placeholder="Email" value="{{$teacher->email}}" required>
                    </div>

                    <div class="input-group mb-3">
                        <select class="form-control" name="country" required>
                            @foreach($countries as $country)
                                <option value="{{$country}}" @if($teacher->country == $country) selected @endif>{{$country}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text mdi mdi-city"></span>
                        </div>
                        <input name="town" type="text" class="form-control" placeholder="Town" value="{{$teacher->town}}" required>
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text mdi mdi-counter"></span>
                        </div>
                        <input name="postcode" type="number" class="form-control" placeholder="Post Code" value="{{$teacher->postcode}}" required>
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text mdi mdi-map-marker"></span>
                        </div>
                        <input name="address" type="text" class="form-control" placeholder="Street Address" value="{{$teacher->address}}" required>
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text mdi mdi-phone"></span>
                        </div>
                        <input name="phone" type="number" class="form-control" placeholder="Phone" value="{{$teacher->phone}}" required>
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text mdi mdi-calendar"></span>
                        </div>
                        <input name="birthday" type="date" class="form-control" data-mask="00/00/0000" value="{{$teacher->birthday}}" required>
                    </div>
                </fieldset>

                <fieldset class="border p-2">
                    <legend class="float-none w-auto p-2" style="color: #31343d;font-size: 15px;font-weight: 600;display: inline-block;margin-bottom: 0.5rem;">Contact Person Info</legend>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text mdi mdi-account"></span>
                        </div>
                        <input name="contactperson" type="text" class="form-control" placeholder="Person for contact" value="{{$teacher->contactperson}}">
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text mdi mdi-phone"></span>
                        </div>
                        <input name="contactpersonphone" type="number" class="form-control" placeholder="Person for contact phone" value="{{$teacher->contactpersonphone}}">
                    </div>
                </fieldset>

                <fieldset class="border p-2">
                    <legend class="float-none w-auto p-2" style="color: #31343d;font-size: 15px;font-weight: 600;display: inline-block;margin-bottom: 0.5rem;">Special Options</legend>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text mdi mdi-account-group-outline"></span>
                        </div>
                        <select class="form-control" onchange="RoleCheck(this);" name="role" required>
                            <option value="Admin" @if($teacher->role == 'Admin') selected @endif>Admin</option>
                            <option value="Teacher" @if($teacher->role == 'Teacher') selected @endif>Teacher</option>
                            <option value="Student" @if($teacher->role == 'Student') selected @endif>Student</option>
                        </select>
                    </div>

                    <fieldset class="border p-2 mb-2" id="TeacherOptions" @if($teacher->role != 'Teacher')style="display: none;" @endif>
                        <legend class="float-none w-auto p-2" style="color: #31343d;font-size: 15px;font-weight: 600;display: inline-block;margin-bottom: 0.5rem;">Teacher's Options</legend>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text mdi mdi-dance-ballroom"></span>
                                </div>
                                <select class="form-control" name="dance_style" required>
                                    <option value="0" selected>None</option>
                                    @foreach($dances as $dance)
                                        <option value="{{$dance->id}}" @if($teacher->getTeacherInfo->dance_style == $dance->id) selected @endif>{{$dance->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text mdi mdi-cursor-text"></span>
                                </div>
                                <input name="short_description" type="text" class="form-control" placeholder="Short description for teacher." value="{{$teacher->getTeacherInfo->description}}">
                            </div>

                            <div class="custom-control custom-checkbox d-inline-block">
                                <input name="active" type="checkbox" class="custom-control-input" id="Active" value="1" @if($teacher->getTeacherInfo->active) checked @endif>
                                <label class="custom-control-label" for="Active">Active</label>
                            </div>
                    </fieldset>

                    <script>
                        function RoleCheck(that) {
                            if (that.value == "Teacher") {
                                document.getElementById("TeacherOptions").style.display = "block";
                            } else {
                                document.getElementById("TeacherOptions").style.display = "none";
                            }
                        }
                    </script>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text mdi mdi-form-textbox-password"></span>
                        </div>
                        <input name="password" type="text" class="form-control" placeholder="New Password">
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text mdi mdi-form-textbox-password"></span>
                        </div>
                        <input name="confirm_password" type="text" class="form-control" placeholder="Confirm Password">
                    </div>

                </fieldset>
                <div class="form-footer mt-6">
                    <button type="submit" class="btn btn-success w-100">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
