<!-- heder start  -->
<header>
  <div class="menuSec">
    <div class="container">
      <div class="col-md-3 col-sm-6 col-xs-6"> <a href="{{url('/')}}"><img src="{{asset( $logo->img_path)}}" alt="img"/></a> </div>
      <div class="col-md-9 hidden-sm hidden-xs">
        <ul id="menu">
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
</header>
<!-- heder end  --> 