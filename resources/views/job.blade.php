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
<section class="Inner_Content JobSec">
  <div class="container">

    <!-- Search Bar -->
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="main_heading text-center" >
  <?= html_entity_decode($job_board->content) ?>
        </div>  
      </div>
  <form>
      <div class="white_bg">

        <div class="col-md-3 col-sm-3 wow fadeInLeft" data-wow-delay="0.5s">
         
          <div class="colct-left">
            <div class="jeans-details">
              
              <h3>Search</h3>
              <div class="search"> 
                <input type="text" name="q" placeholder="Search Jobs...">
                <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
              </div>
         
              <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
               
                <div class="panel panel-default">
                  <div class="panel-heading" role="tab" id="headingTwo">
                    <h4 class="panel-title"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo"> Vacancy Type </a> </h4>
                  </div>
                  <div id="collapseTwo" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingTwo">
                    <div class="panel-body">
                      @foreach($type as $value)
                      <div class="checkbox">
                        <input type="checkbox" id="Vacancy" name="q" value="{{$value->type}}" >
                        <label class="check green"> {{$value->type}} </label>
                       <!--   <span class="right_text">26</span>  --></div> 
                        @endforeach
                 
                    </div>
                  </div>
                </div>
                <div class="panel panel-default">
                  <div class="panel-heading" role="tab" id="headingOne">
                    <h4 class="panel-title"> <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne"> Sectors </a> </h4>
                  </div>
                  <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                    <div class="panel-body">
                      @foreach($sector as $value)
                      <div class="checkbox">
                        <input type="checkbox" id="sector"  name="q" value="{{$value->sector}}">
                        <label class="check"> {{$value->sector}} </label>
                      <!--  <span class="right_text">26</span> --> </div> 
                        @endforeach
                    </div>
                  </div>
                </div>
              </div>
            
            </div>
            <div class="featuresec">
              @foreach($featured as $value)
              <h4>Featured Jobs</h4>
              <h6>{{$value->title}}</h6>
              <span class="Dprice">$ {{$value->salary}}</span> <a href="">Read More</a>
              @endforeach
               </div>
          </div>
           
        </div>
        <div class="col-xs-12 col-sm-9 col-md-9 ">
          <div class="row">
            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
              <div class="list_style">
                <!-- <ul class="list-inline">
                  <li><a href="#"><span><i class="fa fa-long-arrow-down" aria-hidden="true"></i>
                    <i class="fa fa-long-arrow-up" aria-hidden="true"></i></span> Sort</a></li>
                  <li><a href="#"><i class="fa fa-th" aria-hidden="true"></i>Grid</a></li>
                  <li><a href="#"><i class="fa fa-list" aria-hidden="true"></i>List</a></li>
                </ul> -->
              </div>  
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
              <div class="cent">
                 <p>Showing 0 - 12 of 36 results</p>
              </div>  
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
              <div class="pagint_sec">
                 <nav aria-label="Page navigation example">
                  <?php echo $job->render(); ?>
                   </nav>
              </div>
            </div>
          </div>
          @foreach($job as $value)
          <div class="jobColom AccountsSec">
            <div class="col-xs-12 co-sm-3 col-md-6">
              <h3>{{$value->title}}</h3>
              <p><i class="fa fa-map-marker" aria-hidden="true"></i> {{$value->city}}, {{$value->company}} </p>
              @if( $value->status == "expired")
              <p><i class="fa fa-lock" aria-hidden="true"></i> <a href="" class="expired">{{$value->status}}</a></p>

                @else
                  <p><i class="fa fa-unlock" aria-hidden="true"></i> <a href="" class="active">{{$value->status}}</a></p>
                  @endif
            </div>
            <div class="col-xs-12 co-sm-3 col-md-3">
              <h5 class="green_text"> <i class="fa fa-money" aria-hidden="true"></i> ${{$value->salary}}</h5>
              <h5> <i class="fa fa-clock-o" aria-hidden="true"></i> {{$value->type}}</h5>
            </div>
            <div class="col-xs-12 co-sm-3 col-md-4">
              <h5> <i class="fa fa-map-berifcase" aria-hidden="true"></i> {{$value->sector}}</h5>
            </div>
            <div class="col-xs-12 co-sm-3 col-md-2"> <a href="{{ url('job_detail/'.$value->id) }}" class="btn apply_btn"> View More</a> </div>
          </div>
          @endforeach
      
        </div>
      </div>
    </form>
      <div class="clearfix"></div>
      <div class="loader_img"> <img src="{{asset('images/loader.jpg')}}" class="img-responsive" alt=""> </div>
    </div>
  </div>
</section>
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

