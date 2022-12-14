@extends('layouts.default_noslider')


@section('section')
    <div class="edu-breadcrumb-area breadcrumb-style-1 ptb--60 ptb_md--40 ptb_sm--40 bg-image">
        <div class="container eduvibe-animated-shape">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-inner text-start">
                        <div class="page-title">
                            <h3 class="title" style="text-transform: capitalize">{{$post->name}}</h3>
                        </div>
                        <nav class="edu-breadcrumb-nav" style="text-transform: capitalize">
                            <ol class="edu-breadcrumb d-flex justify-content-start liststyle">
                                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                                <li class="separator"><i class="ri-arrow-drop-right-line"></i></li>
                                <li class="breadcrumb-item"><a href="#">Blogs</a></li>
                                <li class="separator"><i class="ri-arrow-drop-right-line"></i></li>
                                <li class="breadcrumb-item active" aria-current="page">{{$post->name}}</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>

            <div class="shape-dot-wrapper shape-wrapper d-xl-block d-none">
                <div class="shape-dot-wrapper shape-wrapper d-xl-block d-none">
                    <div class="shape-image shape-image-1">
                        <img src="{{asset('assets/images/shapes/shape-11-07.png')}}" alt="Shape Thumb" />
                    </div>
                    <div class="shape-image shape-image-2">
                        <img src="{{asset('assets/images/shapes/shape-01-02.png')}}" alt="Shape Thumb" />
                    </div>
                    <div class="shape-image shape-image-3">
                        <img src="{{asset('assets/images/shapes/shape-03.png')}}" alt="Shape Thumb" />
                    </div>
                    <div class="shape-image shape-image-4">
                        <img src="{{asset('assets/images/shapes/shape-13-12.png')}}" alt="Shape Thumb" />
                    </div>
                    <div class="shape-image shape-image-5">
                        <img src="{{asset('assets/images/shapes/shape-36.png')}}" alt="Shape Thumb" />
                    </div>
                    <div class="shape-image shape-image-6">
                        <img src="{{asset('assets/images/shapes/shape-05-07.png')}}" alt="Shape Thumb" />
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="edu-blog-details-area edu-section-gap bg-color-white">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-10 offset-lg-1">
                    <div class="blog-details-1 style-variation3">

                        <div class="content-blog-top">
                            <div class="content-status-top d-flex flex-wrap justify-content-between mb--30 align-items-center">
                                <div class="status-group mt_sm--10">
                                    <a href="{{route('view-category', $post->getCategory->name)}}" class="eduvibe-status status-05 color-primary w-600">{{$post->getCategory->name}}</a>
                                </div>
                                <ul class="blog-meta mt_sm--10">
                                    <li>
                                        <i class="icon-user-line"></i>{{$post->getAuthor->name}}
                                    </li>
                                    <li><i class="icon-calendar-2-line"></i>{{$post->created_at}}</li>
                                </ul>
                            </div>
                            <h4 class="title">{{$post->name}}</h4>
                        </div>

                        <div class="blog-main-content">
                            {!! $post->content !!}
                        </div>

                        <div class="blog-pagination">
                            <div class="row g-5">
                                @if($previous_post)
                                    <div class="col-lg-6">
                                        <div class="blog-pagination-list style-variation-2">
                                            <a href="{{route('view-post',$previous_post->slug)}}">
                                                <i class="ri-arrow-left-s-line"></i>
                                                <span>{{$previous_post->name}}</span>
                                            </a>
                                        </div>
                                    </div>
                                @endif

                                @if($next_post)
                                    <div class="col-lg-6">
                                        <div class="blog-pagination-list style-variation-2 next-post">
                                            <a href="{{route('view-post',$next_post->slug)}}">
                                                <span>{{$next_post->name}}</span>
                                                <i class="ri-arrow-right-s-line"></i>
                                            </a>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

