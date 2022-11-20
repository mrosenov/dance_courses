@extends('admin.layouts.default_admin')

@section('section')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-light">
            <li class="breadcrumb-item"><a href="{{route('admin')}}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Banners</li>
        </ol>
    </nav>
    <div class="card card-default">
        <div class="card-body">
            <a href="{{route('add-banner')}}" class="btn btn-sm btn-success mb-2">Add new banner</a>
            <table class="table table-striped table-bordered" style="text-align: center;">
                <thead>
                <tr>
                    <th scope="col" colspan="5">Banners list</th>
                </tr>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th class="text-center">Short Description</th>
                    <th class="text-center">Duration</th>
                    <th class="text-center">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($banners as $banner)
                    <tr>
                        <td style="vertical-align: middle; text-align: center;">{{ $banner->id }}</td>
                        <td style="vertical-align: middle; text-align: center;"><a href="#">{{ $banner->name }}</a></td>
                        <td style="vertical-align: middle; text-align: center;">{{ $banner->short_description }}</td>
                        <td style="vertical-align: middle; text-align: center;">{{ $banner->active_from }} <br>-<br> {{ $banner->active_to }}</td>
                        <td class="text-center">
                            <a href="#" class="btn btn-sm btn-outline-smoke">
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
