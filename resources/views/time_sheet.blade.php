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

<section class="about_sec inner">
  <div class="container">
    <div class="row flexRow">

      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
        <div class="about_text wow fadeInLeft" data-wow-dusration="2s">
         <div class="dwonload_btn">
     
          <a href="{{asset($blank->timesheet)}}" download ><h3>
            <img src="{{asset($download->image)}}" class="img-responsive" alt="">Download <br>Timesheet</h3></a>

         </div>
         <div class="clearfix"></div>
         <?= html_entity_decode($download->content) ?>
        </div>
      </div>
      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
        <div class="about_img wow fadeInRight" data-wow-dusration="2s"> <img src="{{asset('images/7.png')}}" class="img-responsive" alt=""> </div>
      </div>
    </div>
  </div>
</section>

<section class="where_start time">
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-sm-8 col-md-8 col-md-offset-2 col-sm-offset-2">
        <div class="main_heading text-center">
          <h3>Timesheets Submisson</h3>
          <p>Simply fill in your details below. It is recommended that you do add  your CV to this form below, however it is optional.</p>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="contact_form">
          <form onsubmit="return Validate(this);"  action="{{route('timesheetSubmit')}}" method="POST" 
            enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group col-md-6 col-sm-6 col-xs-12">
             <input type="text" name="name" id="name" placeholder="Name" required="">
            </div>
            <div class="form-group col-md-6 col-sm-6 col-xs-12">
             <input type="text" name="phone" id="phone" placeholder="Phone" required="">
            </div>

            <div class="form-group col-md-12 col-xs-12 col-sm-12">
              <input type="text" name="lookingFor" id="lookingFor" placeholder="Looking For?" required="">
            </div>
            <div class="form-group col-md-6 col-sm-6 col-xs-12">
           <input type="text" name="Time"  id="Time" placeholder="Best time to reach you?" required="">
            </div>
            <div class="form-group col-md-6 col-sm-6 col-xs-12">
           <input type="email" name="email" id="email" placeholder="E-mail" required="">
            </div>
            <div class="form-group col-md-6 col-sm-6 col-xs-12">
               <input type="text" name="subject" id="subject" placeholder="Subject" required="">
            </div>

            <div class="form-group col-md-6 col-sm-6 col-xs-12">
              <input type="text" placeholder="Attach a file..">
              <div class="upload_btn">
                <div class="upload-btn-wrapper">
                  <button class="btn">Upload a file</button>
                 <input type="file" name="file" id="file" placeholder="Attach a file.." required=""/>
                </div>
              </div>
            </div>
            <!-- <div class="form-group col-md-12 col-xs-12 col-sm-12">
              <input type="text" placeholder="Phone">
            </div> -->
            <div class="form-group col-md-12">
              <p> <input type="checkbox" name=""> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent a tortor eu nulla dapibus tincidunt. Maecenas venenatis finibus sapien non interdum. Integer facilisis.</p>
              <input type="submit" value="Submit">
            </div>
          </form>
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
<style type="text/css"></style>
@endsection

@section('js')

  <script>
  var _validFileExtensions = [".pdf", ".doc", ".docx",".xlsx", .];   
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
