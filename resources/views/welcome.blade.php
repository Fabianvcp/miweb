@extends('base')
@section('content')
    <!-- slider_area_start -->
    <div class="slider_area">
        <div class="slider_active owl-carousel">
            <div class="single_slider  d-flex align-items-center slider_bg_2 overlay2">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="slider_text ">
                                <h3> Grow Big with <br>
                                    Musicol Business </h3>
                                <p>Nam libero tempore, cum soluta nobis est eligendi optio <br>
                                    cumque nihil impedit quo minus.</p>
                                <div class="video_service_btn">
                                    <a href="#" class="boxed-btn3">Our Services</a>
                                    <a href="#" class="boxed-btn3-white"> <i class="fa fa-play"></i>
                                        See How it Work</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single_slider  d-flex align-items-center slider_bg_1 overlay2">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="slider_text ">
                                <h3> Grow Big with <br>
                                    Musicol Business </h3>
                                <p>Nam libero tempore, cum soluta nobis est eligendi optio <br>
                                    cumque nihil impedit quo minus.</p>
                                <div class="video_service_btn">
                                    <a href="#" class="boxed-btn3">Our Services</a>
                                    <a href="#" class="boxed-btn3-white"> <i class="fa fa-play"></i>
                                        See How it Work</a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single_slider  d-flex align-items-center slider_bg_2 overlay2">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="slider_text ">
                                <h3> Grow Big with <br>
                                    Musicol Business </h3>
                                <p>Nam libero tempore, cum soluta nobis est eligendi optio <br>
                                    cumque nihil impedit quo minus.</p>
                                <div class="video_service_btn">
                                    <a href="#" class="boxed-btn3">Our Services</a>
                                    <a href="#" class="boxed-btn3-white"> <i class="fa fa-play"></i>
                                        See How it Work</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- slider_area_end -->

    <!-- service_area_start -->
    <div class="service_area">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="section_title text-center mb-50">
                        <h3>Explore Our Solutions</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-4 col-md-4">
                    <div class="single_service service_bg_1">
                        <div class="service_hover">
                            <img src="/assets/img/svg_icon/legal-paper.svg" alt="">
                            <h3>Invoicing</h3>
                            <div class="hover_content">
                                <div class="hover_content_inner">
                                    <h4>Invoicing</h4>
                                    <p>These cases are perfectly simple and easy to distinguish. In a free hour power.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-4">
                    <div class="single_service service_bg_2">
                        <div class="service_hover">
                            <img src="/assets/img/svg_icon/case.svg" alt="">
                            <h3>Business Growth</h3>
                            <div class="hover_content">
                                <div class="hover_content_inner">
                                    <h4>Business Growth</h4>
                                    <p>These cases are perfectly simple and easy to distinguish. In a free hour power.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-4">
                    <div class="single_service service_bg_3">
                        <div class="service_hover">
                            <img src="/assets/img/svg_icon/survey.svg" alt="">
                            <h3>Problem Solving</h3>
                            <div class="hover_content">
                                <div class="hover_content_inner">
                                    <h4>Problem Solving</h4>
                                    <p>These cases are perfectly simple and easy to distinguish. In a free hour power.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- service_area_end -->

    <!-- about  -->
    @include('partials.about_area')
    <!--/ about  -->

    <!-- counter  -->
    @include('partials.counter_area')
    <!--/ counter  -->

    {{--/testimonial_area--}}
    @include('partials.testmonial_area')
    {{--/testimonial_area--}}

    <!-- project  -->
        @include('partials.project_area')
    <!--/ project  -->

@endsection
