@extends('admin.layouts.default_admin')

@section('section')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-light">
            <li class="breadcrumb-item"><a href="{{route('admin')}}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Dance Styles</li>
        </ol>
    </nav>

    <div class="card card-default">
        <div class="card-body">
            <a href="#" class="btn btn-sm btn-success mb-2">Add new dance style</a>
            <table id="productsTable" class="table table-product table-striped table-bordered" style="width:100%">
                <thead>
                <tr>
                    <th scope="col" style="text-align: center;">#</th>
                    <th scope="col" style="text-align: center;">Name</th>
                    <th scope="col" style="text-align: center;">Description</th>
                </tr>
                </thead>
                <tbody>
                @foreach($DanceStyles as $DanceStyle)
                    <tr>
                        <td style="text-align: center; vertical-align: middle;">{{$DanceStyle->id}}</td>
                        <td style="text-align: center; vertical-align: middle;"><a href="#">{{$DanceStyle->name}}</a></td>
                        <td style="text-align: center; vertical-align: middle;">{{$DanceStyle->description}}</td>
                        <td style="text-align: center; vertical-align: middle;">
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
