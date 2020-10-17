@extends('base')

@section('content')

    @include('partials.breadcam')
    <!--================Portfolio Area =================-->
    <!-- gallery -->
    <div class="gallery_area">
        <div class="container">
            <div class="row grid">
                @forelse( $portfolios as $portfolio)

                    <div class="col-xl-4 col-lg-6 grid-item cat1 col-md-6">
                        <div class="single-gallery mb-20">
                            <div class="portfolio-img">
                                <img src="/galeria/{{ $portfolio->image }}" alt="">
                            </div>
                            <div class="gallery_hover">
                                <a href="{{ route('portfolio.show', $portfolio) }}" class="hover_inner">
                                    <h3>{{ $portfolio->title }}</h3>
                                    <span>{{ $portfolio->category_p->name }}</span>
                                </a>
                            </div>
                        </div>
                    </div>
                @empty

                    <div class="col-xl-12 col-lg-12 grid-item cat1 col-md-12">
                        <div class="single-gallery mb-20 text-center">
                                <div  class="hover_inner">
                                    <h3>No hay elementos cargados</h3>
                                </div>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
        <!--/ gallery -->

        <!-- testmonial_area start  -->
        <div class="testmonial_area">
            <div class="container">
                <div class="row">
                    <div class="col-xl-10 offset-xl-1">
                        <div class="testmonial_active2 owl-carousel">
                            <div class="single_slider text-center" data-dot='<img src="img/testmonial/1.png" alt="#" '>
                                <p>These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able.</p>
                                <div class="author_name text-center">
                                    <h4>Robert Jonson</h4>
                                    <span> Business Owner</span>
                                </div>
                            </div>
                            <div class="single_slider text-center" data-dot='<img src="img/testmonial/1.png" alt="#" '>
                                <p>These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able.</p>
                                <div class="author_name text-center">
                                    <h4>Robert Jonson</h4>
                                    <span> Business Owner</span>
                                </div>
                            </div>
                            <div class="single_slider text-center" data-dot='<img src="img/testmonial/1.png" alt="#" '>
                                <p>These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able.</p>
                                <div class="author_name text-center">
                                    <h4>Robert Jonson</h4>
                                    <span> Business Owner</span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- testmonial_area end  -->

        <!-- project  -->
        <div class="project_area">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="project_info text-center">
                            <h3>Do you Have any Project?</h3>
                            <p>Nam libero tempore, cum soluta nobis est eligendi optio <br> cumque nihil impedit quo minus.</p>
                            <a href="#" class="boxed-btn3-white">Contact Us</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/ project  -->

    <!--================Blog Area =================-->
@stop()
