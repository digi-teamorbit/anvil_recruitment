<!-- footer start -->
<div class="footerSec">
<div class="container">
  <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
      <div class="inner_foot">
        <img src="{{asset( $logo->img_path)}}" class="img-responsive" alt="">
      </div>  
    </div>
  </div>
</div>
<div class="container-fluid nopd">
  <div class="border"> <hr></div>
  <div class="foot_menu text-center">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
       <ul class="list-inline">
          <li><a class="{{request()->routeIs('home') ? 'active' : '' }}" href="{{ url('/') }}">Home</a>
                 </li>
          <li><a class="{{request()->routeIs('aboutus') ? 'active' : '' }}" href="{{url('aboutus')}}"> About Us </a></li>
          <li><a  class="{{request()->routeIs('time-sheet') ? 'active' : '' }}" href="{{('time-sheet')}}">Timesheets</a></li>
          <li><a class="{{request()->routeIs('job') ? 'active' : '' }}" href="{{url('job')}}">Live Jobs board</a></li>
          <li><a class="{{request()->routeIs('testimonial') ? 'active' : '' }}" href="{{url('testimonial')}}"> Testimonials</a></li>
          <li><a class="{{request()->routeIs('contact') ? 'active' : '' }}" href="{{url('contact')}}"> Contact Us</a></li>
       </ul>  
    </div>
  </div>
</div>
  <div class="copy_right">
    <div class="container">
      <p>{{ App\Http\Traits\HelperTrait::returnFlag(499) }}</p>
    </div>
  </div>
</div>
<!-- footer end --> 