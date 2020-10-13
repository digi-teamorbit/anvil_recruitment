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
<div class="black_bg">
  
 <section class="cont-sec1">
      <div class="container">
        <div class="row">
          <div class="col-sm-3">
            <div class="consec-box1">
              <span class="csb1-f"><i class="fa fa-flag" aria-hidden="true"></i></span>
              <h4>Address</h4>
              <div class="csb1">
               <a href="#">{{ App\Http\Traits\HelperTrait::returnFlag(519) }}</a>
              </div>
            </div>
          </div>
          <div class="col-sm-3">
            <div class="consec-box1">
              <span class="csb1-f"><i class="fa fa-flag" aria-hidden="true"></i></span>
              <h4>Phones</h4>
              <div class="csb1">
                <a href="tel:{{ App\Http\Traits\HelperTrait::returnFlag(519) }}">{{ App\Http\Traits\HelperTrait::returnFlag(59) }}- Office </a>
                <a href="tel:{{ App\Http\Traits\HelperTrait::returnFlag(1965) }}">{{ App\Http\Traits\HelperTrait::returnFlag(1965) }} - Fax</a>
              </div>
            </div>
          </div>
          <div class="col-sm-3">
            <div class="consec-box1">
              <span class="csb1-f"><i class="fa fa-flag" aria-hidden="true"></i></span>
              <h4>Email</h4>
              <div class="csb1">
                <a href="mailto:{{ App\Http\Traits\HelperTrait::returnFlag(218) }}">{{ App\Http\Traits\HelperTrait::returnFlag(218)}}</a>
              </div>
            </div>
          </div>
          <div class="col-sm-3">
            <div class="consec-box1">
              <span class="csb1-f"><i class="fa fa-flag" aria-hidden="true"></i></span>
              <h4>Follow Us</h4>
              <div class="csb1">
                <ul class="bc-socila">
                  <li><a href="{{ App\Http\Traits\HelperTrait::returnFlag(682) }}" target="_blank"><i class="fa fa-facebook-official" aria-hidden="true"></i></a></li>
                  <li><a href="{{ App\Http\Traits\HelperTrait::returnFlag(1960) }}" target="_blank"><i class="fa fa-twitter-square" aria-hidden="true"></i></a></li>
                  <li><a href="{{ App\Http\Traits\HelperTrait::returnFlag(1963) }}" target="_blank"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a></li>
                   <li><a href="{{ App\Http\Traits\HelperTrait::returnFlag(1961) }}" target="_blank"><i class="fa fa-pinterest-square" aria-hidden="true"></i></a></li>
            <!--       <li><a href="{{ App\Http\Traits\HelperTrait::returnFlag(1963) }}" target="_blank"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a></li>
                
                  <li><a href="{{ App\Http\Traits\HelperTrait::returnFlag(682) }}" target="_blank"><i class="fa fa-vimeo-square" aria-hidden="true"></i></a></li>
                  <li><a href="{{ App\Http\Traits\HelperTrait::returnFlag(682) }}"target="_blank"><i class="fa fa-pinterest-square" aria-hidden="true"></i></a></li>
                  <li><a href="{{ App\Http\Traits\HelperTrait::returnFlag(682) }}"target="_blank"><i class="fa fa-vimeo-square" aria-hidden="true"></i></a></li>
                  <li><a href="{{ App\Http\Traits\HelperTrait::returnFlag(682) }}" target="_blank"><i class="fa fa-pinterest-square" aria-hidden="true"></i></a></li> -->
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
 </section>
  <section class="getintouchSec all-section">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12 centerCol">
          <div class="main-heading">
            <?=html_entity_decode($contact->content)  ?>
       
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12 centerCol">
          <div class="formSec">
            <form action="{{route('contactUsSubmit')}}" method="POST">
            {{ csrf_field() }}
            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="form-group">
                <input name="fname" class="form-control" placeholder="Full Name" type="text">
                <i aria-hidden="true" class="fa fa-user"></i> 
              </div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="form-group">
                <input name="email" class="form-control" placeholder="Email Address" type="text">
                <i aria-hidden="true" class="fa fa-envelope"></i> 
              </div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="form-group">
                <input name="subject" class="form-control" placeholder="Your Website" type="text">
                <i aria-hidden="true" class="fa fa-globe"></i> 
              </div>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="form-group">
                <textarea cols="" name="extra_content" placeholder="Type Here Messages" rows=""></textarea>
                <i aria-hidden="true" class="fa fa-paper-plane"></i> 
              </div>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12 text-center">
              <input type="submit" value="SEND MESSAGE">
            </div>
          </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

@endsection
@section('css')
<style type="text/css">
  
</style>
@endsection

@section('js')
<script type="text/javascript">
  
</script>
@endsection


