<!-- bradcam_area  -->
@if( request()->route()->getName('blog.show') || request()->routeIs('blog'))
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
@elseif( request()->routeIs('portfolio'))
    <div class="bradcam_area breadcam_bg_2">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text text-center">
                        <h3>Portfolio</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
@else

@endif
<!--/ bradcam_area  -->
