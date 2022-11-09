@extends('admin.layouts.default_admin')

@section('section')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-light">
            <li class="breadcrumb-item"><a href="{{route('admin')}}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Semester</li>
        </ol>
    </nav>
    <div class="card card-default">
        <div class="card-header">
            <h2>All studios for semester [ {{$semester->id}} ] - {{$semester->name}}</h2>
        </div>
        <div class="card-body">
                <a href="#" class="btn btn-sm btn-success mb-2">Add new studio</a>
                <table class="table table-striped table-bordered" style="text-align: center;">
                    <thead>
                    <tr>
                        <th scope="col" colspan="4">Studios</th>
                    </tr>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Studio Name</th>
                        <th scope="col">Active</th>
                        <th class="text-center">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($semester->Studios as $studio)
                        <tr>
                            <td scope="row" style="vertical-align: middle">{{$studio->id}}</td>
                            <td style="vertical-align: middle"><a href="{{route('studio', $studio->id)}}">{{$studio->name}}</a></td>
                            <td style="vertical-align: middle">{{ $studio->active ? 'Active' : 'Not Active' }}</td>
                            <th class="text-center">
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
