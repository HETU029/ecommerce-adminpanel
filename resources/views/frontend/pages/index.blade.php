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
       <!--Card content-->
        <div class="card-body elegant-color white-text" id="card" style="background-color: #fff;">
            <!--Page Title-->
            <h4 class="card-title">
            {{ $page->title }} </h4>
            <hr class="hr-light">
            <div class="post-footer d-flex align-items-center flex-column flex-sm-row"><a href="#" class="author d-flex  align-items-center 
              flex-wrap">
              <div class="date white-text"><i class="fa fa-clock-o"></i>{{ $page->created_at->diffForHumans() }}</div>&nbsp &nbsp
               
              </div>
              &nbsp
              &nbsp

              <!--Page Content-->
              <div class="widget tags">       
                <div class="row">
                  <div class="form-group col-md-12">
                    <div class="font-small mb-4 white-text"> 
                      {!! $page->description !!}
                    </div>
                  </div>
                </div>
              </div>

            </div>
          </div>
          <!--/.Card content-->
        </div>
        <!--/.Card-->
      </div>
    </div>
  </div>
  <!--/.Main layout-->
</main>



@endsection

 
   
    
                      