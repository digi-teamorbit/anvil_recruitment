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

<section class="about_sec">
  <div class="container">
    <div class="row flexRow">
      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
        <div class="about_img wow fadeInLeft" data-wow-dusration="2s"> <img src="{{asset($detail->image)}}" class="img-responsive" alt=""> </div>
      </div>
      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
        <div class="about_text wow fadeInRight" data-wow-dusration="2s">
          <?= html_entity_decode($detail->content) ?>
          <div class="contact_form">
          <form onsubmit="return Validate(this);"  action="{{route('timesheetSubmit')}}" method="POST"

            enctype="multipart/form-data">
            <input type="hidden" name="job_id" value="{{ $jobdetail->id }}">
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
          <!--     <p> <input type="checkbox" name=""> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent a tortor eu nulla dapibus tincidunt. Maecenas venenatis finibus sapien non interdum. Integer facilisis.</p> -->
              <button class="btn blue">Apply Now</button>
            </div>
          </form>
        </div>

        
            
          <!-- <a href="#" class="btn blue">Read More</a> --> 

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
<script>
  var _validFileExtensions = [".pdf", ".doc", ".docx",".xlsx"];   
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
