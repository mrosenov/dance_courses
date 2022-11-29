@extends('admin.layouts.default_admin')

@section('section')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-light">
            <li class="breadcrumb-item"><a href="{{route('admin')}}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Students</li>
        </ol>
    </nav>
    <div class="card card-default">
        <div class="card-body">
            <table id="productsTable" class="table table-product table-striped table-bordered" style="width:100%">
                <thead>
                <tr>
                    <th scope="col" style="text-align: center;">#</th>
                    <th scope="col" style="text-align: center;">Name</th>
                    <th scope="col" style="text-align: center;">Email</th>
                    <th scope="col" style="text-align: center;">Age</th>
                    <th scope="col" style="text-align: center;">Role</th>
                    <th scope="col" style="text-align: center;">Last update</th>
                    <th scope="col" style="text-align: center;width: 195.641px;">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($students as $student)
                    <tr>
                        <td style="text-align: center; vertical-align: middle;">{{$student->id}}</td>
                        <td style="text-align: center; vertical-align: middle;">{{$student->name}}</td>
                        <td style="text-align: center; vertical-align: middle;">{{$student->email}}</td>
                        <td style="text-align: center; vertical-align: middle;">{{$AgeGroup->StudentAge($student->birthday)}}</td>
                        <td style="text-align: center; vertical-align: middle;">{{$student->role}}</td>
                        <td style="text-align: center; vertical-align: middle;">{{$student->updated_at}}</td>
                        <td style="text-align: center; vertical-align: middle;">
                            <a href="{{route('edit-student', $student->id)}}" class="btn btn-sm btn-outline-smoke">
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
