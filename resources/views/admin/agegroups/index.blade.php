@extends('admin.layouts.default_admin')

@section('section')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-light">
            <li class="breadcrumb-item"><a href="{{route('admin')}}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Age Groups</li>
        </ol>
    </nav>

    <div class="card card-default">
        <div class="card-body">
            <a href="{{route('add-age-groups')}}" class="btn btn-sm btn-success mb-2">Add new age group</a>
            <table id="productsTable" class="table table-product table-striped table-bordered" style="width:100%">
                <thead>
                <tr>
                    <th scope="col" style="text-align: center;">#</th>
                    <th scope="col" style="text-align: center;">Name</th>
                    <th scope="col" style="text-align: center;">Description</th>
                    <th scope="col" style="text-align: center;">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($AgeGroups as $AgeGroup)
                    <tr>
                        <td style="text-align: center; vertical-align: middle;">{{$AgeGroup->id}}</td>
                        <td style="text-align: center; vertical-align: middle;"><a href="{{route('edit-age-groups', $AgeGroup->id)}}">{{$AgeGroup->name}}</a></td>
                        <td style="text-align: center; vertical-align: middle;">{{$AgeGroup->description}}</td>
                        <td style="text-align: center; vertical-align: middle;">
                            <a href="{{route('edit-age-groups', $AgeGroup->id)}}" class="btn btn-sm btn-outline-smoke">
                                <i class="fa-duotone fa-pen-to-square"></i>
                            </a>
                            <a href="{{route('delete-age-group', $AgeGroup->id)}}" class="btn btn-sm btn-outline-smoke">
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
