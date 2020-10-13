@extends('layouts.main')
@section('content')
<section class="inner_banner"  style="
    background: url({{asset($innerbanner->image)}}) no-repeat top center/ cover;
">
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="inner_text text-center">
          <h1 class="wow fadeInUp" data-wow-dusration="2s">{{$innerbanner->description}}</h1>
        </div>  
      </div>
    </div>
  </div>
</section>

<!-- Testimonial Section Begin -->
<section class="testimonial-sec-main padding-80">
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-sm-8 col-sm-12 col-sm-offset-2 col-md-offset-2 col-xs-12">
        <div class="web-center-content text-center">
          <?=html_entity_decode($testimonial->content) ?>
      <!--     <h2 class="wow fadeInDown" data-wow-duration="2s" data-wow-delay="0.6s">Our Happy Clients</h2>
          <p class="wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.9s">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent a tortor eu nulla dapibus tincidunt. Maecenas venenatis finibus sapien non interdum. Integer facilisis.</p> -->
        </div>
      </div>
      <div class="testimonial-sec-box">
        @foreach($testi as $value)
        <div class="col-md-6 col-xs-12 col-sm-6">
          <div class="rateMian wow zoomIn" data-wow-duration="2s" data-wow-delay="0.1s">
            <div class="rate_div">
              <div class="rate_img">
                <div class="col-md-2 col-xs-12 col-sm-2 no-margin"></div>
                <div class="col-md-6 col-xs-12 col-sm-6 no-margin">
                  <h2>{{$value->name}}</h2>
                  <h3> {{$value->verified}}</h3>
                </div>
                <div class="col-md-3 col-xs-12 col-sm-3 no-margin">

                 <span class="cp-rating">
                 {!! str_repeat('<span class="fa fa-star" aria-hidden="true"></span>', $value->rating) !!}
                 {!! str_repeat('<span class="fa fa-star-o" aria-hidden="true"></span>', 5 - $value->rating) !!}
                   </span> 
               </div>
                <div class="clearfix"></div>
              </div>
              <img src="{{asset($value->image)}}" class="img-responsive" alt="rate">
             <?=html_entity_decode($value->comments) ?>
            </div>
          </div>
        </div>
        @endforeach       
      </div>
    </div>
  </div>
</section>
<!-- Testimonial Section End -->
@endsection
@section('css')
<style type="text/css">
  
</style>
@endsection

@section('js')
<script type="text/javascript">
  
</script>
@endsection


