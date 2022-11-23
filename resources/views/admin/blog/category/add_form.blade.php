@extends('admin.layouts.default_admin')

@section('section')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-light">
            <li class="breadcrumb-item"><a href="{{route('admin')}}">Home</a></li>
            <li class="breadcrumb-item" aria-current="page"><a href="{{route('blog-category')}}">Categories</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add Category</li>
        </ol>
    </nav>
    <div class="card card-default">
        <div class="card-body">
            <form method="POST" action="{{route('store-blog-category')}}">
                @csrf
                <div class="form-group">
                    <label for="CategoryName">Category Name</label>
                    <input name="name" type="text" class="form-control" id="CategoryName" placeholder="Name" required>
                </div>
                <div class="form-group">
                    <label for="CategorySlug">Category Slug</label>
                    <input name="slug" type="text" class="form-control" id="CategorySlug" placeholder="Slug" required>
                </div>
                <div class="form-footer mt-6">
                    <button type="submit" class="btn btn-success w-100">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
