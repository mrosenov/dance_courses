@extends('admin.layouts.default_admin')

@section('section')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-light">
            <li class="breadcrumb-item"><a href="{{route('admin')}}">Home</a></li>
            <li class="breadcrumb-item" aria-current="page"><a href="{{route('blog-posts', $category->id)}}">{{$category->name}}</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add Post</li>
        </ol>
    </nav>
    <div class="card card-default">
        <div class="card-body">
            <form method="POST" action="{{route('store-blog-post', $category->id)}}">
                @csrf
                <div class="form-group">
                    <label for="PostName">Post Name</label>
                    <input name="name" type="text" class="form-control" id="PostName" placeholder="Name" required>
                </div>
                <div class="form-group">
                    <label for="PostSlug">Post Slug</label>
                    <input name="slug" type="text" class="form-control" id="PostSlug" placeholder="Slug" required>
                </div>

                <div class="form-group">
                    <label for="PostContent">Content</label>
                    <textarea id="summernote" name="postcontent"></textarea>
                </div>
                <div class="form-footer mt-6">
                    <button type="submit" class="btn btn-success w-100">Submit</button>
                </div>
            </form>
            <script>

            </script>
        </div>
    </div>
@endsection
