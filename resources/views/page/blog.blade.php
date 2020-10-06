@extends('base')

@section('content')
    <!-- bradcam_area  -->
    <div class="bradcam_area breadcam_bg_4">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text text-center">
                        <h3>Blog</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ bradcam_area  -->

    <!--================Blog Area =================-->
    <section class="blog_area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mb-5 mb-lg-0">
                    <div class="blog_left_sidebar" >

                        <!--================publicación Area =================-->
                        @forelse( $posts as $post)
                            <article class="blog_item">
                                <div class="blog_item_img card-img">
                                    <img class="card-img rounded-0" src="/assets/img/blog/single_blog_1.png" alt="">
                                    <a href="#" class="blog_item_date">
                                        <h3>{{ optional($post->published_at)->locale('es')->translatedFormat('l d') }}</h3>
                                        <p>{{ optional($post->published_at)->locale('es')->translatedFormat('\d\e F \d\e\l\ Y') }}</p>
                                    </a>
                                </div>

                                <div class="blog_details card-body">
                                    <a class="d-inline-block" href="single-blog.html">
                                        <h2>{{$post->title}}</h2>
                                    </a>
                                    <p>{{ $post->excerpt }}</p>
                                    <ul class="blog-info-link">

                                        <li><a href="#"><i class="fa fa-user"></i> Travel, Lifestyle</a></li>
                                        <li><a href="#"><i class="fa fa-flag"></i> {{  $post->category->name }}</a></li>
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
                        <nav class="blog-pagination justify-content-center d-flex">
                            <ul class="pagination">
                                <li class="page-item">
                                    <a href="#" class="page-link" aria-label="Previous">
                                        <i class="ti-angle-left"></i>
                                    </a>
                                </li>
                                <li class="page-item">
                                    <a href="#" class="page-link">1</a>
                                </li>
                                <li class="page-item active">
                                    <a href="#" class="page-link">2</a>
                                </li>
                                <li class="page-item">
                                    <a href="#" class="page-link" aria-label="Next">
                                        <i class="ti-angle-right"></i>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                        <!--================/pagination Area =================-->

                    </div>
                </div>

                <!--================right sidebar Area =================-->
                <div class="col-lg-4">
                    <div class="blog_right_sidebar">

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

                    </div>
                </div>
                <!--================/right sidebar Area =================-->

            </div>
        </div>
    </section>
    <!--================Blog Area =================-->
@stop()
