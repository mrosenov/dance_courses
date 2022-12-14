@extends('layouts.default')

<!-- Start Sldier Area  -->
@section('index_slider')
    @if($banners)
    <div class="owl-carousel">
        @foreach($banners as $banner)
            <div>
                <a href="{{$banner->url}}"><img src="{{asset($banner->file_path)}}"></a>
                <div class="slide_caption">
                    <div class="container">
                        <h2 class="banner_title">{{$banner->title}}</h2>
                        <div class="slide_text">
                            <p class="banner_text">{{$banner->short_description}}</p>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    @endif
@endsection
<!-- End Sldier Area  -->

@section('index_posts')
    <!-- Start Blog Area  -->
    @if(count($posts) > 0)
    <div class="eduvibe-home-two-blog edu-blog-area edu-section-gap bg-image">
        <div class="wrapper">
            <div class="container eduvibe-animated-shape">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-12">
                        <div class="section-title text-center" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">
                            <span class="pre-title">Latest From News</span>
                            <h3 class="title">Get Our Every News & Blog</h3>
                        </div>
                    </div>
                </div>
                <div class="row g-5 mt--30">

                    <!-- Start Blog Grid  -->
                    @foreach($posts as $post)
                    <div class="col-lg-4 col-md-6 col-12" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">
                        <div class="edu-blog blog-type-2 bg-white radius-small">
                            <div class="inner">
                                <div class="thumbnail">
                                    <a href="{{route('view-post', $post->slug)}}">
                                        <img src="assets/images/blog/post-01/post-01.jpg" alt="Blog Images">
                                    </a>
                                </div>
                                <div class="content">
                                    <div class="status-group">
                                        <a href="{{route('view-category', $post->getCategory->slug)}}" class="eduvibe-status status-05"><i class="icon-price-tag-3-line"></i> {{$post->getCategory->name}}</a>
                                    </div>
                                    <h5 class="title"><a href="{{route('view-post', $post->slug)}}">{{$post->name}}</a></h5>
                                    <div class="blog-card-bottom">
                                        <ul class="blog-meta">
                                            <li><i class="icon-calendar-2-line"></i>{{$post->created_at}}</li>
                                        </ul>
                                        <div class="read-more-btn">
                                            <a class="btn-transparent" href="{{route('view-post', $post->slug)}}">Read More<i class="icon-arrow-right-line-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <!-- End Blog Grid  -->
                </div>

                <div class="shape-dot-wrapper shape-wrapper d-xl-block d-none">
                    <div class="shape-image shape-image-1">
                        <img src="assets/images/shapes/shape-13-06.png" alt="Shape Thumb" />
                    </div>
                    <div class="shape-image shape-image-3">
                        <img src="assets/images/shapes/shape-13-05.png" alt="Shape Thumb" />
                    </div>
                    <div class="shape-image shape-image-4">
                        <img src="assets/images/shapes/shape-25.png" alt="Shape Thumb" />
                    </div>
                </div>

            </div>

            <div class="shape-dot-wrapper shape-wrapper d-xl-block d-none">
                <div class="shape-image shape-image-2">
                    <img src="assets/images/shapes/shape-24.png" alt="Shape Thumb" />
                </div>
            </div>

        </div>
    </div>
    @endif
    <!-- End Blog Area  -->
@endsection

@section('index_events')
    <!-- Start Event Area  -->
    <div class="edu-event-area eduvibe-home-two-event edu-section-gap bg-image">
        <div class="container eduvibe-animated-shape">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title text-center" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">
                        <span class="pre-title">Let’s Learn Together</span>
                        <h3 class="title">Upcoming Educational Events</h3>
                    </div>
                </div>
            </div>
            <div class="row g-5 mt--25">
                <!-- Start Event List  -->
                <div class="col-lg-12" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">
                    <div class="edu-event event-list radius-small bg-white">
                        <div class="inner">
                            <div class="thumbnail">
                                <a href="event-details.html">
                                    <img src="assets/images/event/event-01/event-01.jpg" alt="Event Images">
                                </a>
                            </div>
                            <div class="content">
                                <div class="content-left">
                                    <h5 class="title"><a href="event-details.html">Consumer Food Safety Education Conference</a></h5>
                                    <ul class="event-meta">
                                        <li><i class="icon-calendar-2-line"></i>15th December 2022</li>
                                        <li><i class="icon-time-line"></i>10:00 AM</li>
                                        <li><i class="icon-map-pin-line"></i>IAC Building, New York, NY</li>
                                    </ul>
                                </div>
                                <div class="read-more-btn">
                                    <a class="edu-btn btn-dark" href="event-details.html">Book A Seat<i class="icon-arrow-right-line-right"></i></a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- End Event List  -->

                <!-- Start Event List  -->
                <div class="col-lg-12" data-sal-delay="200" data-sal="slide-up" data-sal-duration="800">
                    <div class="edu-event event-list radius-small bg-white">
                        <div class="inner">
                            <div class="thumbnail">
                                <a href="event-details.html">
                                    <img src="assets/images/event/event-01/event-02.jpg" alt="Event Images">
                                </a>
                            </div>
                            <div class="content">
                                <div class="content-left">
                                    <h5 class="title"><a href="event-details.html">Virtual Spring Part-time Jobs
                                            Fair for Student</a></h5>
                                    <ul class="event-meta">
                                        <li><i class="icon-calendar-2-line"></i>12th November 2022</li>
                                        <li><i class="icon-time-line"></i>09:00 AM</li>
                                        <li><i class="icon-map-pin-line"></i>IAC Building, New York, NY</li>
                                    </ul>
                                </div>
                                <div class="read-more-btn">
                                    <a class="edu-btn btn-dark" href="event-details.html">Book A Seat<i class="icon-arrow-right-line-right"></i></a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- End Event List  -->

                <!-- Start Event List  -->
                <div class="col-lg-12" data-sal-delay="250" data-sal="slide-up" data-sal-duration="800">
                    <div class="edu-event event-list radius-small bg-white">
                        <div class="inner">
                            <div class="thumbnail">
                                <a href="event-details.html">
                                    <img src="assets/images/event/event-01/event-03.jpg" alt="Event Images">
                                </a>
                            </div>
                            <div class="content">
                                <div class="content-left">
                                    <h5 class="title"><a href="event-details.html">Explorations of Regional
                                            Chief Executive Network</a></h5>
                                    <ul class="event-meta">
                                        <li><i class="icon-calendar-2-line"></i>28th Octabar 2022</li>
                                        <li><i class="icon-time-line"></i>08:00 AM</li>
                                        <li><i class="icon-map-pin-line"></i>IAC Building, New York, NY</li>
                                    </ul>
                                </div>
                                <div class="read-more-btn">
                                    <a class="edu-btn btn-dark" href="event-details.html">Book A Seat<i class="icon-arrow-right-line-right"></i></a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- End Event List  -->
            </div>

            <div class="shape-dot-wrapper shape-wrapper d-xl-block d-none">
                <div class="shape-image shape-image-1">
                    <img src="assets/images/shapes/shape-03-07.png" alt="Shape Thumb" />
                </div>
                <div class="shape-image shape-image-2">
                    <img src="assets/images/shapes/shape-02-04.png" alt="Shape Thumb" />
                </div>
                <div class="shape-image shape-image-3">
                    <img src="assets/images/shapes/shape-05-02.png" alt="Shape Thumb" />
                </div>
                <div class="shape-image shape-image-4">
                    <img src="assets/images/shapes/shape-13-05.png" alt="Shape Thumb" />
                </div>
                <div class="shape shape-1"><span class="shape-dot"></span></div>
            </div>
        </div>
    </div>
    <!-- End Event Area  -->
@endsection
