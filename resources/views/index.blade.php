@extends('layouts.main')
@section('content')
<?php

   if(isset($_GET['q']) && $_GET['q'] != '') {

        
                $keyword = $_GET['q'];
                $keywordsector = $_GET['q'];
               // dd($keywordsector);
                $keywordsearch = $_GET['q'];
                  //dd($keywordsearch);
                $job = DB::table('jobs')
                ->where('type', 'like', '%'.$keyword.'%')
                ->orWhere('sector', 'like', '%'.$keywordsector.'%')
                ->orWhere('title', 'like', '%'.$keywordsearch.'%')
          
                ->paginate(5);
                
                  }else{

                   $job = DB::table('jobs')->paginate(5);
                    }

?>

<!-- banner start -->
<section class="main_slider">
  <div id="carousel-example-generic" class="carousel slide" data-ride="carousel"> 
    <!-- Indicators -->
    <?php $counter=0; ?>
    <ol class="carousel-indicators">
      <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
      <li data-target="#carousel-example-generic" data-slide-to="1"></li>
      <li data-target="#carousel-example-generic" data-slide-to="2"></li>
    </ol>
    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
       @if($banner)
      @foreach($banner as $value)
      <div class="item {{ $counter == 0 ? 'active' : '' }}"> <img src="{{asset($value->image)}}" alt="img">
        <div class="carousel-caption">
          <div class="container">
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
              <div class="banner_text">
                <?= html_entity_decode($value->description) ?>

               <form action="{{url('job')}}">
                <div class="banner_input wow fadeInUp" data-wow-dusration="2s">      
                  <input name="q" type="text" placeholder="Job Title">
                  <input type="submit" value="Search Jobs">
                </div>
                 </form>  
                 
              </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
              <div class="banner_img wow fadeInRight" data-wow-dusration="2s"> <img src="{{asset($value->banner_image)}}" class="img-responsive" alt=""> </div>
            </div>
          </div>
        </div>
      </div>
 <?php $counter++;  ?>
      @endforeach
<!-- 
               <form action="{{url('job')}}">
                <div class="banner_input wow fadeInUp" data-wow-dusration="2s">
                
                  <input name="q" type="text" placeholder="Job Title">
                  <input type="submit" value="Search Jobs">
               
                </div>
                 </form>   -->
      @endif


     
    </div>
<!--     <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev"> <span class="fa fa-angle-up" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a> <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next"> <span class="fa fa-angle-down" aria-hidden="true"></span> <span class="sr-only">Next</span> </a> --> </div>
  <div class="banner_phone wow fadeInLeft" data-wow-dusration="2s">
    <h4>QUESTIONS?</h4>
    <a href="tel:{{ App\Http\Traits\HelperTrait::returnFlag(519) }}">{{ App\Http\Traits\HelperTrait::returnFlag(59)}}</a> </div>
</section>
<!-- banner end --> 
<!-- about_sec   -->
<section class="about_sec">
  <div class="container">
    <div class="row flexRow">
      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
        <div class="about_img wow fadeInLeft" data-wow-dusration="2s"> <img src="{{asset($cms_home1->image)}}" class="img-responsive" alt=""> </div>
      </div>
      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
        <div class="about_text wow fadeInRight" data-wow-dusration="2s">
   <?=html_entity_decode($cms_home1->content)  ?>
          <a href="#" class="btn blue">Read More</a> </div>
      </div>
    </div>
  </div>
</section>
<section class="where_start">
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
        <div class="main_heading text-center">
          <h3>Not Sure Where To Start?</h3>
          <p>Simply fill in your details below. It is recommended that you do add  your CV to this form below, however it is optional.</p>
        </div>
      </div>
    </div>

 <form onsubmit="return Validate(this);"  action="{{route('timesheetSubmit')}}" method="POST" 
            enctype="multipart/form-data">
            {{ csrf_field() }}
    <div class="row">
      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
        <div class="contact_form">
         
            <div class="form-group">
              <input type="text" name="name" id="name" placeholder="Name" required="">
            </div>
            <div class="form-group">
              <input type="text" name="phone" id="phone" placeholder="Phone" required="">
            </div>
            <div class="form-group">
              <input type="text" name="lookingFor" id="lookingFor" placeholder="Looking For?" required="">
            </div>
            <div class="form-group">
              <input type="text" name="Time"  id="Time" placeholder="Best time to reach you?" required="">
            </div>
       
        </div>
      </div>

      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
        <div class="contact_form">
       
            <div class="form-group">
              <input type="email" name="email" id="email" placeholder="E-mail" required="">
            </div>
            <div class="form-group">
              <input type="text" name="subject" id="subject" placeholder="Subject" required="">
            </div>
            <div class="form-group">
              <!-- <input type="file"  name="file" id="file" placeholder="Attach a file.." required=""> -->
               <input type="text"  name="file" id="file" placeholder="Attach a file.."> 
              <div class="upload_btn">
                <div class="upload-btn-wrapper">
                   <button class="btn">Upload a file</button> 
                  <input type="file" name="file" id="file" placeholder="Attach a file.." required=""/>
                </div>
              </div>
            </div>
            <div class="form-group">
              <input type="submit" value="Submit your application">
            </div>
        </div>
      </div>
    </div>
</form>

  </div>
</section>
<section class="sector_sec">
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-sm-10 col-md-10 col-md-offset-1 col-sm-offset-1">
        <div class="main_heading text-center">
         <?= html_entity_decode($cms_home2->content)?>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
          <div class="circle_img"></div>
          <div class="row">
            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 nopd">
              <div class="sec_img"> <img src="{{asset($cms_home3->image)}}" class="img-responsive" alt=""> </div>
            </div>
            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 nopd">
              <div class="sec_text">
               <?= html_entity_decode($cms_home3->content)?>
              </div>
            </div>
            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 nopd">
              <div class="sec_img"> <img src="{{asset($cms_home4->image)}}" class="img-responsive" alt=""> </div>
            </div>
            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 nopd">
              <div class="sec_text">
                <?= html_entity_decode($cms_home4->content)?>
                
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 nopd">
              <div class="sec_text">
                 <?= html_entity_decode($cms_home5->content)?>
              </div>
            </div>
            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 nopd">
              <div class="sec_img"> <img src="{{asset($cms_home5->image)}}" class="img-responsive" alt=""> </div>
            </div>
            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 nopd">
              <div class="sec_text">
                 <?= html_entity_decode($cms_home6->content)?>
              </div>
            </div>
            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 nopd">
              <div class="sec_img"> <img src="{{asset($cms_home6->image)}}" class="img-responsive" alt=""> </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- help section  -->
<section class="help_sec"  style="
    background: url({{asset($help->image)}}) no-repeat top center/ cover;
">
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="help_text text-center">
       <?= html_entity_decode($help->content) ?>
          <a href="{{url('job')}}" class="btn blue">Join Us </a> </div>
      </div>
    </div>
  </div>
</section>

<!-- news sec -->
<section class="sector_sec">
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-sm-10 col-md-10 col-md-offset-1 col-sm-offset-1">
        <div class="main_heading text-center">
          <?=html_entity_decode($latest->content) ?>
        </div>
      </div>
      <div class="row">
        @foreach($news as $value)
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
          <div class="news_div  wow zoomIn" data-wow-dusration="2s"> <img src="{{asset($value->image)}}" class="img-responsive" alt="">
            <div class="date"> <span>16 dec</span> </div>
            <h4>{{($value->name)}}?</h4>
            <div class="comment">
        <!--       <hr>
              <ul class="list-inline">
                <li><a href="#"> Posted  by :</a></li>
                <li><a href="#"><i class="fa fa-user" aria-hidden="true"></i>Admin</a></li>
                <li><a href="#"><i class="fa fa-comment" aria-hidden="true"></i>Comment</a></li>
                <li><a href="#"><i class="fa fa-thumbs-up" aria-hidden="true"></i>like</a></li>
              </ul>
              <hr> -->
            </div>
           <?= html_entity_decode($value->detail) ?>
          </div>
        </div> 
        @endforeach
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
            <!--   <button>send message</button> -->
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
<style>

</style>
@endsection

@section('js')
  <script>
  var _validFileExtensions = [".pdf", ".doc", ".docx"];   
function Validate(oForm) {
    var arrInputs = oForm.getElementsByTagName("input");
    for (var i = 0; i < arrInputs.length; i++) {
        var oInput = arrInputs[i];
        if (oInput.type == "file") {
            var sFileName = oInput.value;
            if (sFileName.length > 0) {
                var blnValid = false;
                for (var j = 0; j < _validFileExtensions.length; j++) {
                    var sCurExtension = _validFileExtensions[j];
                    if (sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
                        blnValid = true;
                        break;
                    }
                }
                
                if (!blnValid) {
                    alert("Invalid File Type! Please Upload in either " + _validFileExtensions.join(", or ") + " Format.");
                    return false;
                }
            }
        }
    }
  
    return true;
}
  
  </script>
@endsection