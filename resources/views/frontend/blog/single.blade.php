@extends('frontend.main')

@section('title','|Blogs Page')

@section('content')

@include('frontend.sidebars.left_sidebar')

<!--Main layout-->
<main>
    <div class="row mt-5 pt-4">
        <div class="col-lg-4">
            <!--Card-->
            <div>
                <!--Blog image-->
                <div class="view overlay" id="dark">
                    <a href="{{ route('frontend.frontend.blog.single',$blog->slug)}}">
                        <img src="/storage/img/blog/{{$blog->featured_image}}" class="img-fluid" id="dark" alt="work desk">
                    </a>
                </div>

                <div class="card-body elegant-color white-text" id="card">
                    <!--Blog Title-->
                    <h4 class="card-title">
                        <a href="{{ route('frontend.frontend.blog.single',$blog->slug)}}" class="white-text">
                            {{ $blog->name }}
                        </a>
                    </h4>

                    <hr class="hr-light">

                    <div class="post-footer d-flex align-items-center flex-column flex-sm-row">
                        <!--Blog Created Date-->
                        <div class="date white-text">
                            <i class="fa fa-clock-o"></i>
                            {{ $blog->created_at->diffForHumans() }}
                        </div>
                        &nbsp
                        &nbsp

                        <!--Blog Views-->
                        <div class="views white-text">
                            <i class="fa fa-eye"></i>
                            {{ $blog->getPageViews() }}
                        </div>
                    </div>
                    &nbsp
                    &nbsp

                    <!--Blog Content-->
                    <div class="widget tags">
                          <div class="row">
                            <div class="form-group col-md-12">
                                <div class="font-small mb-4 white-text"> {!! $blog->content !!} </div>
                            </div>
                        </div>
                    </div>

                    <div class="post-tags">
                        <h3 class="h6 white-text"> {{ trans('labels.general.tags') }}</h3>
                        @foreach($blog->tags as $tag)
                        <a href="/search/{{ $tag->id }}" class="tag white-text">{{ $tag->name }}</a>
                        @endforeach
                    </div>
                    &nbsp
                    &nbsp

                    <div class="post-tags">
                        <h3 class="h6 white-text">{{ trans('labels.general.category') }}</h3>
                        @foreach($blog->categories as $category)
                           <a href="/search/{{ $category->id }}" class="white-text">{{ $category->name }}
                           </a>
                        @endforeach
                    </div>

                    <hr class="hr-light">
                    <div class="add-comment">
                        <header>
                            <h3 class="h6">{{ trans('labels.general.comment') }}</h3>
                        </header>
                        <div class="widget tags">
                            <form action="#" class="commenting-form">
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <div id="disqus_thread"></div>
                                        <script>
/**
*  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
*  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
                             var disqus_config = function () {
                                      this.page.url = '{{  Request::url() }}';  // Replace PAGE_URL with your page's canonical URL variable
                                      this.page.identifier =  {{ $blog->slug }}; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                                  };


                              (function() { // DON'T EDIT BELOW THIS LINE
                                     var d = document, s = d.createElement('script');
                                     s.src = 'https://blogs-9.disqus.com/embed.js';
                                     s.setAttribute('data-timestamp', +new Date());
                                    (d.head || d.body).appendChild(s);
                                })();
                                        </script>
                                        <noscript>
                                            Please enable JavaScript to view the
                                            <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a>
                                        </noscript>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</main><!--/.Main layout-->
@endsection



