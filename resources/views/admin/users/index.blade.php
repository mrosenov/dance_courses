@extends('admin.layouts.default_admin')

@section('section')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-light">
            <li class="breadcrumb-item"><a href="{{route('admin')}}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Users</li>
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
                @foreach($users as $user)
                    <tr>
                        <td style="text-align: center; vertical-align: middle;">{{$user->id}}</td>
                        <td style="text-align: center; vertical-align: middle;">{{$user->name}}</td>
                        <td style="text-align: center; vertical-align: middle;">{{$user->email}}</td>
                        <td style="text-align: center; vertical-align: middle;">{{$AgeGroup->StudentAge($user->birthday)}}</td>
                        <td style="text-align: center; vertical-align: middle;">{{$user->role}}</td>
                        <td style="text-align: center; vertical-align: middle;">{{$user->updated_at}}</td>
                        <td style="text-align: center; vertical-align: middle;">
                            @if($user->role == 'Admin')
                                <a href="{{ route('edit-user', $user->id) }}" class="btn btn-sm btn-outline-smoke">
                                    <i class="fa-duotone fa-pen-to-square"></i>
                                </a>
                            @elseif($user->role == 'Teacher')
                                <a href="{{ route('edit-teacher', $user->id) }}" class="btn btn-sm btn-outline-smoke">
                                    <i class="fa-duotone fa-pen-to-square"></i>
                                </a>
                            @elseif($user->role == 'Student')
                                <a href="{{ route('edit-student', $user->id) }}" class="btn btn-sm btn-outline-smoke">
                                    <i class="fa-duotone fa-pen-to-square"></i>
                                </a>
                            @endif

                            @if($user->role == 'Admin')
                                <a href="{{route('delete-user', $user->id)}}" class="btn btn-sm btn-outline-smoke">
                                    <i class="fa-duotone fa-trash"></i>
                                </a>
                            @elseif($user->role == 'Teacher')
                                <a href="{{route('delete-teacher', $user->id)}}" class="btn btn-sm btn-outline-smoke">
                                    <i class="fa-duotone fa-trash"></i>
                                </a>
                            @elseif($user->role == 'Student')
                                <a href="{{route('delete-student', $user->id)}}" class="btn btn-sm btn-outline-smoke">
                                    <i class="fa-duotone fa-trash"></i>
                                </a>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
