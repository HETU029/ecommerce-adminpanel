@extends('frontend.main')

@section('title','|Blogs Page')

@section('content')

@include('frontend.sidebars.left_sidebar')

<!--Main layout-->

<main>

    <div class="container"> <!--Container start-->
        <div class="row mt-5 pt-4">
            @foreach($blogs as $blog)

               @include('frontend.blog.blogs')
               
            @endforeach
        </div>
    </div><!--Container end-->
    
    <!--Pagination-->
    <div class="row flex-center">
        <nav>
            <div class="container h-100">
                <div class="row h-100 justify-content-center align-items-center">
                    {!! $blogs->render("pagination::bootstrap-4")   !!}
                </div>
            </div>
        </nav>
    </div>

</main>
@endsection


 
   
