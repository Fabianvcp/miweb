@extends('base')

@section('content')

    @include('partials.breadcam')



    <!-- about wrap  -->
    <div class="about_wrap_area about_wrap_area2">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-md-6 col-lg-4">
                    <div class="single_service_wrap text-center">
                        <img src="img/svg_icon/controls.png" alt="">
                        <h3>Unlimited Control</h3>
                        <p>These cases are perfectly simple and easy to </p>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 col-lg-4">
                    <div class="single_service_wrap text-center">
                        <img src="img/svg_icon/bar-chart.png" alt="">
                        <h3>Rapidly Growth</h3>
                        <p>These cases are perfectly simple and easy to </p>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 col-lg-4">
                    <div class="single_service_wrap text-center">
                        <img src="img/svg_icon/puzzle.png" alt="">
                        <h3>Problem Solving</h3>
                        <p>These cases are perfectly simple and easy to </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ about wrap  -->

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
