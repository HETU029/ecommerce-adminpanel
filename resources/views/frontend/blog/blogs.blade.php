<div class="col-lg-4" id="card-review">
    <!--Card-->
    <div class="card card-dark" id="card-view" >
        <!--Blog image-->
        <div class="view overlay" id="card-image">
            <a href="{{ route('frontend.frontend.blog.single',$blog->slug)}}">
                <img src="/storage/img/blog/{{$blog->featured_image}}" " class="img-fluid" alt="work desk">
            </a>
        </div>

        <div class="card-body elegant-color white-text" id="card-content" >
            <!--Blog Title-->
            <h4 class="card-title"> <a href="{{ route('frontend.frontend.blog.single',$blog->slug)}}" class="white-text">{{$blog->name}}</a></h4>
            <hr class="hr-light">
            <!--Blog Content-->
            <p class="font-small mb-4">{!! strlen( $blog->content ) > 200 ? substr( $blog->content, 0, 200) . ' ...' : $blog->content !!}<i class="fa fa-chevron-right pl-2"></i></p>
             <a href="{{ route('frontend.frontend.blog.single',$blog->slug)}}" id="read" class="white-text">Read More</a><i class="fa fa-chevron-right"></i>
        </div>
    </div>
    <!--/.Card-->
</div>
