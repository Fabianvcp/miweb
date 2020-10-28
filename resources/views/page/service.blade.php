@extends('base')

@section('content')

    @include('partials.breadcam')

    {{--service-area--}}
        @include('partials.service-area')
    {{--/service-area--}}

    {{--/testimonial_area--}}
        @include('partials.testmonial_area')
    {{--/testimonial_area--}}

    <!-- project  -->
        @include('partials.project_area')
    <!--/ project  -->

@endsection
