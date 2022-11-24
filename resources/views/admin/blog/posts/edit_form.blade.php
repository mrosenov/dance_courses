@extends('admin.layouts.default_admin')

@section('section')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-light">
            <li class="breadcrumb-item"><a href="{{route('admin')}}">Home</a></li>
            <li class="breadcrumb-item" aria-current="page"><a href="{{route('blog-category')}}">Categories</a></li>
            <li class="breadcrumb-item" aria-current="page"><a href="{{route('blog-posts', $currentCategory->id)}}">{{$currentCategory->name}}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{$post->name}}</li>
        </ol>
    </nav>
    <div class="card card-default">
        <div class="card-body">
            <form method="POST" action="{{route('update-blog-post', [$currentCategory->id, $post->id])}}">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label for="PostName">Post Name</label>
                    <input name="name" type="text" class="form-control" id="PostName" placeholder="Name" value="{{$post->name}}" required>
                </div>
                <div class="form-group">
                    <label for="PostSlug">Post Slug</label>
                    <input name="slug" type="text" class="form-control" id="PostSlug" placeholder="Slug" value="{{$post->slug}}" required>
                </div>
                <div class="form-group">
                    <label for="PostSlug">Category</label>
                    <select class="js-example-basic-single form-control" name="category">
                        <option disabled selected>Choose Category</option>
                        @foreach($categories as $category)
                            <option value="{{$category->id}}" @if($category->id == $currentCategory->id) selected @endif>{{$category->name}} {{ ($category->id == $currentCategory->id) ? '[Current Category]' : '' }}</option>
                        @endforeach
                    </select>
                </div>

                <textarea id="summernote" name="postcontent">{{$post->content}}</textarea>


                <div class="form-footer mt-6">
                    <button type="submit" class="btn btn-success w-100">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
