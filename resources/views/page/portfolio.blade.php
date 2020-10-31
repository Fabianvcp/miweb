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
                                <a href="{{ route('perfil', $portfolio) }}" class="hover_inner">
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

    {{--/testimonial_area--}}
    @include('partials.testmonial_area')
    {{--/testimonial_area--}}

    <!-- project  -->
    @include('partials.project_area')
    <!--/ project  -->


    <!--================ perfil Area =================-->
@endsection
