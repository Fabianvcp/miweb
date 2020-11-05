    <div class="col-lg-4">
        <div class="blog_right_sidebar">

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
            <!--================Category Area =================-->
            <aside class="single_sidebar_widget post_category_widget">
                <h4 class="widget_title">Categoria</h4>
                <ul class="list cat-list">
                    @foreach( $categories as $category)
                    <li>
                        <a href="{{ route('categories.show', $category) }}" class="d-flex">
                            <p>{{ $category->name}} </p>
                        </a>
                    </li>
                    @endforeach
                </ul>
                <h4 class="widget_title">Autores</h4>
                <ul class="list cat-list">
                    @foreach( $authors as $author)
                    <li>
                        <a  class="d-flex">
                            <p>{{ $author->name}}</p>
                        </a>
                    </li>
                    @endforeach
                </ul>
            </aside>
            <!--================/Category Area =================-->

            <!--================Recent Post Area =================-->
            <aside class="single_sidebar_widget popular_post_widget">
                <h3 class="widget_title">Publicaciónes recientes</h3>
                @foreach( $publicaciones as $publicacion)
                    <div class="media post_item">
                    <img src="/thumbnail/{{ $publicacion->portada }} " alt="{{ $publicacion->title }}" height="80px" width="80px">
                    <div class="media-body">
                        <a href="/blog/{{ $publicacion->url }}">
                            <h3>{{ $publicacion->title }}</h3>
                        </a>
                        <p>{{ optional($post->published_at)->locale('es')->translatedFormat('l d \d\e F \d\e\l\ Y') }}</p>
                    </div>
                </div>
                @endforeach

            </aside>
            <!--================/Recent Post Area =================-->

            <!--================Tag Area =================-->
            <aside class="single_sidebar_widget tag_cloud_widget">
                <h4 class="widget_title">Tag Clouds</h4>
                <ul class="list">
                    @foreach( $tags as $tag )
                        <li>
                            <a href="{{ route('tags.show', $tag)}}">{{ $tag->name }}</a>
                        </li>
                    @endforeach
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
