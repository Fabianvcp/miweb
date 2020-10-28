@extends('base')

@section('meta-title', 'Blog')

@section('content')

@include('partials.breadcam')
    <!--================Blog Area =================-->
    <section class="blog_area section-padding">
        <div class="container">
            <div class="row">
                <!--================right sidebar Area =================-->
                <div class="col-lg-8 mb-5 mb-lg-0">
                    <!--================publicación Area =================-->
                    <div class="blog_left_sidebar" >
                        @if( isset($title))
                            <article class="blog_item card shadow">

                                <div class="blog_details card-body text-center">
                                    <a class="d-inline-block card-title " >
                                        <h2 class="text-center">{{ $title }}</h2>
                                    </a>

                                </div>
                            </article>
                        @endif
                        @forelse( $posts as $post)
                            <article class="blog_item card shadow" @if($post->portada === null) style="margin-top: 10vh;" @endif>
                                <div class="blog_item_img card-img ">
                                    @if($post->portada)
                                    <img class="card-img rounded-0" src="/thumbnail/{{$post->portada}}" alt="">

                                    @endif
                                    <a href="#" class="blog_item_date" >
                                        <h3>{{ optional($post->published_at)->locale('es')->translatedFormat('l d') }}</h3>
                                        <p>{{ optional($post->published_at)->locale('es')->translatedFormat('\d\e F \d\e\l\ Y') }}</p>
                                    </a>
                                </div>

                                <div class="blog_details card-body">
                                    <a class="d-inline-block" href="blog/{{ $post->url }}">
                                        <h2>{{$post->title}}</h2>
                                    </a>
                                    <p>{{ $post->excerpt }}</p>
                                    <ul class="blog-info-link">
                                        @foreach( $post->tags as $tag )
                                        <li><a href="{{ route('tags.show', $tag)}}"><i class="fa fa-tag"></i> #{{ $tag->name }}</a></li>
                                        @endforeach

                                        <li><a href="{{ route('categories.show',$post->category) }}"><i class="fa fa-flag"></i> {{  $post->category->name }}</a></li>
                                    </ul>
                                </div>
                            </article>

                        @empty
                            <article class="blog_item card">

                                <div class="blog_details card-body">
                                    <a class="d-inline-block card-title" >
                                        <h2>No hay publicaciones creadas por el momento</h2>
                                    </a>

                                </div>
                            </article>
                        @endforelse
                        <!--================/publicación Area =================-->

                        <!--================pagination Area =================-->
                            {{ $posts->links() }}
                       <!--================/pagination Area =================-->
                    </div>
                    <!--================right sidebar Area =================-->
                </div>

                @include('posts.siderbar_derecha')
                <!--================/right sidebar Area =================-->

            </div>
        </div>
    </section>
    <!--================Blog Area =================-->
@endsection
