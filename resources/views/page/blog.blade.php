@extends('base')

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

                <div class="col-lg-4">
                    <div class="blog_right_sidebar">

                        <aside class="single_sidebar_widget search_widget">
                            <form action="#">
                                <div class="form-group">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" placeholder='Search Keyword'
                                               onfocus="this.placeholder = ''" onblur="this.placeholder = 'Search Keyword'">
                                        <div class="input-group-append">
                                            <button class="btn" type="button"><i class="ti-search"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn"
                                        type="submit">Search</button>
                            </form>
                        </aside>
                        <!--================Category Area =================-->
                        <aside class="single_sidebar_widget post_category_widget">
                            <h4 class="widget_title">Category</h4>
                            <ul class="list cat-list">
                                <li>
                                    <a href="#" class="d-flex">
                                        <p>Resaurant food</p>
                                        <p>(37)</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="d-flex">
                                        <p>Travel news</p>
                                        <p>(10)</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="d-flex">
                                        <p>Modern technology</p>
                                        <p>(03)</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="d-flex">
                                        <p>Product</p>
                                        <p>(11)</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="d-flex">
                                        <p>Inspiration</p>
                                        <p>21</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="d-flex">
                                        <p>Health Care (21)</p>
                                        <p>09</p>
                                    </a>
                                </li>
                            </ul>
                        </aside>
                        <!--================/Category Area =================-->

                        <!--================Recent Post Area =================-->
                        <aside class="single_sidebar_widget popular_post_widget">
                            <h3 class="widget_title">Recent Post</h3>
                            <div class="media post_item">
                                <img src="/assets/img/post/post_1.png" alt="post">
                                <div class="media-body">
                                    <a href="single-blog.html">
                                        <h3>From life was you fish...</h3>
                                    </a>
                                    <p>January 12, 2019</p>
                                </div>
                            </div>
                            <div class="media post_item">
                                <img src="/assets/img/post/post_2.png" alt="post">
                                <div class="media-body">
                                    <a href="single-blog.html">
                                        <h3>The Amazing Hubble</h3>
                                    </a>
                                    <p>02 Hours ago</p>
                                </div>
                            </div>
                            <div class="media post_item">
                                <img src="/assets/img/post/post_3.png" alt="post">
                                <div class="media-body">
                                    <a href="single-blog.html">
                                        <h3>Astronomy Or Astrology</h3>
                                    </a>
                                    <p>03 Hours ago</p>
                                </div>
                            </div>
                            <div class="media post_item">
                                <img src="/assets/img/post/post_4.png" alt="post">
                                <div class="media-body">
                                    <a href="single-blog.html">
                                        <h3>Asteroids telescope</h3>
                                    </a>
                                    <p>01 Hours ago</p>
                                </div>
                            </div>
                        </aside>
                        <!--================/Recent Post Area =================-->

                        <!--================Tag Area =================-->
                        <aside class="single_sidebar_widget tag_cloud_widget">
                            <h4 class="widget_title">Tag Clouds</h4>
                            <ul class="list">
                                <li>
                                    <a href="#">project</a>
                                </li>
                                <li>
                                    <a href="#">love</a>
                                </li>
                                <li>
                                    <a href="#">technology</a>
                                </li>
                                <li>
                                    <a href="#">travel</a>
                                </li>
                                <li>
                                    <a href="#">restaurant</a>
                                </li>
                                <li>
                                    <a href="#">life style</a>
                                </li>
                                <li>
                                    <a href="#">design</a>
                                </li>
                                <li>
                                    <a href="#">illustration</a>
                                </li>
                            </ul>
                        </aside>
                        <!--================/Tag Area =================-->

                        <!--================instagram feeds Area =================-->
                        <aside class="single_sidebar_widget instagram_feeds">
                            <h4 class="widget_title">Instagram Feeds</h4>
                            <ul class="instagram_row flex-wrap">
                                <li>
                                    <a href="#">
                                        <img class="img-fluid" src="/assets/img/post/post_5.png" alt="">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img class="img-fluid" src="/assets/img/post/post_6.png" alt="">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img class="img-fluid" src="/assets/img/post/post_7.png" alt="">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img class="img-fluid" src="/assets/img/post/post_8.png" alt="">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img class="img-fluid" src="/assets/img/post/post_9.png" alt="">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img class="img-fluid" src="/assets/img/post/post_10.png" alt="">
                                    </a>
                                </li>
                            </ul>
                        </aside>
                        <!--================instagram feeds Area =================-->

                        <aside class="single_sidebar_widget newsletter_widget">
                            <h4 class="widget_title">Newsletter</h4>
                            <form action="#">
                                <div class="form-group">
                                    <input type="email" class="form-control" onfocus="this.placeholder = ''"
                                           onblur="this.placeholder = 'Enter email'" placeholder='Enter email' required>
                                </div>
                                <button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn"
                                        type="submit">Subscribe</button>
                            </form>
                        </aside>

                    </div>
                </div>
                <!--================/right sidebar Area =================-->

            </div>
        </div>
    </section>
    <!--================Blog Area =================-->
@stop()
