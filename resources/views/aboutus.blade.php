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

<section class="family_sec">
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-sm-8 col-md-8 col-md-offset-2  col-sm-offset-2">
        <div class="row">
          <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
            <div class="family_div">
              <img src="{{asset('images/fa_1.jpg')}}" class="img-circle" alt="">
               <h3>Colin Griffiths  <small>|  Director</small></h3>
               <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent a tortor eu nulla dapibus tincidunt venenatis </p>
               <h4>Follow Us:</h4>
               <div class="family_icon">
                 <ul class="list-inline">
                   <li><a href="#" class="f"></a></li>
                   <li><a href="#" class="t"></a></li>
                   <li><a href="#" class="i"></a></li>
                   <li><a href="#" class="y"></a></li>
                 </ul>
               </div>
            </div>  
          </div>     
          <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
            <div class="family_div">
              <img src="{{asset('images/fa_2.jpg')}}" class="img-circle" alt="">
               <h3>Colin Griffiths  <small>|  Director</small></h3>
               <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent a tortor eu nulla dapibus tincidunt venenatis </p>
               <h4>Follow Us:</h4>
               <div class="family_icon">
                 <ul class="list-inline">
                   <li><a href="#" class="f"></a></li>
                   <li><a href="#" class="t"></a></li>
                   <li><a href="#" class="i"></a></li>
                   <li><a href="#" class="y"></a></li>
                 </ul>
               </div>
            </div>  
          </div>
        </div>  
      </div>
    </div>
  </div>
</section>

<section class="contact_sec">
  <div class="container">
    <div class="row">
      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
        <div class="cotact_form2">
          <h3>Need More Information?</h3>
          <form action="{{ route('contactUsSubmit')  }}" method="post">
            {{ csrf_field() }}
          <div class="form-group">
            <input name="fname" type="text" placeholder="Name" required="">
          </div>          
          <div class="form-group">
            <input name="email" type="text" placeholder="E-mail" required="">
          </div>         
           <div class="form-group">
            <input  name="subject" type="text" placeholder="Subject" required="">
          </div>         
           <div class="form-group">
            <textarea name="message" placeholder="Message" required=""></textarea>
          </div>        
            <div class="form-group">
          <!--     <button>send message</button> -->
            <input type="submit" value="Send Message">
          </div>
        </form>
        </div>  
      </div>
      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
        <div class="contact_text">
        <?=html_entity_decode($homecontact->content) ?>
          <div class="address"> 
            <ul>
              <li><a href="#"><i class="fa fa-map-marker" aria-hidden="true"></i><strong>Address:</strong>{{ App\Http\Traits\HelperTrait::returnFlag(519) }}</a></li>
              <li><a href="tel:{{ App\Http\Traits\HelperTrait::returnFlag(59) }}"><i class="fa fa-phone" aria-hidden="true"></i><strong>Phone:</strong>{{ App\Http\Traits\HelperTrait::returnFlag(59) }}</a></li>
              <li><a href="mailto:{{ App\Http\Traits\HelperTrait::returnFlag(218) }}"><i class="fa fa-envelope" aria-hidden="true"></i><strong>Email :</strong> {{ App\Http\Traits\HelperTrait::returnFlag(218) }}</a></li>
            </ul>
          </div>
            <div class="social_icon">
              <h5>Follow Us</h5>
              <ul class="list-inline">
                <li><a href="{{ App\Http\Traits\HelperTrait::returnFlag(682) }}" target="_blank"> <i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                <li><a href="{{ App\Http\Traits\HelperTrait::returnFlag(1960) }}" target="_blank"> <i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                <li><a href="{{ App\Http\Traits\HelperTrait::returnFlag(1964) }}" target="_blank"> <i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
             <!--    <li><a href="{{ App\Http\Traits\HelperTrait::returnFlag(1960) }}"> <i class="fa fa-google-plus" aria-hidden="true"></i></a></li> -->
              </ul>
            </div>
        </div>  
      </div>
    </div>
  </div>
</section>

@endsection
@section('css')
<style type="text/css">
  
</style>
@endsection

@section('js')
<script type="text/javascript">
  
</script>
@endsection

