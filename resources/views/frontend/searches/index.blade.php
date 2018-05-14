@extends('frontend.main')

@section('title')| Search

@endsection

@section('content')

@include('frontend.sidebars.left_sidebar')

<!--Search Result PAage Main Layout-->
<main>

    <div class="blog-header">
        <h1>We've found {{ $blogs->count() }} results for your search term in all blog entries</h1>
    </div>

    <div class="container"><!--Container start-->
        <div class="row mt-5 pt-4">
            @if( $blogs->count() )

              @foreach( $blogs as $blog )

                 @include('frontend.blog.blogs')

              @endforeach
              
            @else

               <p>No blog martch on your term </p>

            @endif
        </div>
    </div><!--Container end-->

</main>

@endsection