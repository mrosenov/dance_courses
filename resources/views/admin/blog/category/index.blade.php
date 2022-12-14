@extends('admin.layouts.default_admin')

@section('section')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-light">
            <li class="breadcrumb-item"><a href="{{route('admin')}}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Blog Categories</li>
        </ol>
    </nav>
    <div class="card card-default">
        <div class="card-body">
            <a href="{{route('add-blog-category')}}" class="btn btn-sm btn-success mb-2">Add new category</a>
            <table class="table table-striped table-bordered" style="width:100%">
                <thead>
                <tr>
                    <th scope="col" style="text-align: center;">#</th>
                    <th scope="col" style="text-align: center;">Category Name</th>
                    <th scope="col" style="text-align: center;">Slug</th>
                    <th scope="col" style="text-align: center;width: 216.641px;">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td style="text-align: center; vertical-align: middle;">{{ $category->id }}</td>
                        <td style="text-align: center; vertical-align: middle;"><a href="{{route('blog-posts', $category->id)}}">{{ $category->name }}</a></td>
                        <td style="text-align: center; vertical-align: middle;">{{ $category->slug }}</td>
                        <td style="text-align: center; vertical-align: middle;">
                            <a href="{{route('edit-blog-category-form', $category->id)}}" class="btn btn-sm btn-outline-smoke">
                                <i class="fa-duotone fa-pen-to-square"></i>
                            </a>
                            <a href="{{route('blog-posts', $category->id)}}" class="btn btn-sm btn-outline-smoke">
                                <i class="fa-duotone fa-newspaper"></i>
                            </a>
                            <a href="{{route('delete-blog-category', $category->id)}}" class="btn btn-sm btn-outline-smoke">
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
