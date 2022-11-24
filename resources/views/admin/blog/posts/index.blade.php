@extends('admin.layouts.default_admin')

@section('section')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-light">
            <li class="breadcrumb-item"><a href="{{route('admin')}}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Blog Posts</li>
        </ol>
    </nav>
    <div class="card card-default">
        <div class="card-body">
            <a href="{{route('add-blog-post', $category->id)}}" class="btn btn-sm btn-success mb-2">Add new blog post</a>
            <table class="table table-striped table-bordered" style="width:100%">
                <thead>
                <tr>
                    <th scope="col" style="text-align: center;">#</th>
                    <th scope="col" style="text-align: center;">Post Name</th>
                    <th scope="col" style="text-align: center;">Slug</th>
                    <th scope="col" style="text-align: center;">Category</th>
                    <th scope="col" style="text-align: center;">Author</th>
                    <th scope="col" style="text-align: center;width: 195.641px;">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($posts->getPosts as $post)
                    <tr>
                        <td style="text-align: center; vertical-align: middle;">{{ $post->id }}</td>
                        <td style="text-align: center; vertical-align: middle;"><a href="#">{{ $post->name }}</a></td>
                        <td style="text-align: center; vertical-align: middle;">{{ $post->slug }}</td>
                        <td style="text-align: center; vertical-align: middle;">{{ $post->getCategory->name }}</td>
                        <td style="text-align: center; vertical-align: middle;">{{ $post->getAuthor->name }}</td>
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
