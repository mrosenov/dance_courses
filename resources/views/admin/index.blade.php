@extends('admin.layouts.default_admin')

@section('section')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-light">
            <li class="breadcrumb-item active" aria-current="page">Home</li>
        </ol>
    </nav>
    <div class="card card-default">
        <div class="card-header">
            <h2>List of all students</h2>
        </div>
        <div class="card-body">
            <a href="#" class="btn btn-sm btn-success mb-2">Add new student</a>
            <table id="productsTable" class="table table-hover table-product table-striped table-bordered" style="width:100%">
                <thead>
                <tr>
                    <th scope="col" style="text-align: center;">#</th>
                    <th scope="col" style="text-align: center;">Name</th>
                    <th scope="col" style="text-align: center;">Email</th>
                    <th scope="col" style="text-align: center;">Age</th>
                    <th scope="col" style="text-align: center;">Role</th>
                    <th scope="col" style="text-align: center;">Last update</th>
                    <th scope="col" style="text-align: center;">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $student)
                <tr>
                    <td style="text-align: center; vertical-align: middle;">{{$student->id}}</td>
                    <td style="text-align: center; vertical-align: middle;">{{$student->name}}</td>
                    <td style="text-align: center; vertical-align: middle;">{{$student->email}}</td>
                    <td style="text-align: center; vertical-align: middle;">{{$AgeGroup->StudentAge($student->birthday)}}</td>
                    <td style="text-align: center; vertical-align: middle;">{{$student->role}}</td>
                    <td style="text-align: center; vertical-align: middle;">{{$student->updated_at}}</td>
                    <td style="text-align: center; vertical-align: middle;">
                        <div class="dropdown">
                            <a class="dropdown-toggle icon-burger-mini" href="#" role="button" id="dropdownMenuLink"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
