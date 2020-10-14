<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\inquiry;
use App\schedule;
use App\newsletter;
use App\post;
use App\banner;
use App\imagetable;
use App\Timesheet;
use DB;
use Mail;use View;
use Session;
use App\Http\Helpers\UserSystemInfoHelper;
use App\Http\Traits\HelperTrait;
use Auth;
use App\Profile;
use File;


class HomeController extends Controller
{   
    use HelperTrait;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
     // use Helper;
     
    public function __construct()
    {
        //$this->middleware('auth');

        $logo = imagetable::
                     select('img_path')
                     ->where('table_name','=','logo')
                     ->first();
             
        $favicon = imagetable::
                     select('img_path')
                     ->where('table_name','=','favicon')
                     ->first(); 
        
        View()->share('logo',$logo);
        View()->share('favicon',$favicon);

    } 

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $banner = DB::table('banners')->get();   
        
        $cms_home1 = DB::table('pages')->where('id', 1)->first();
        $cms_home2 = DB::table('pages')->where('id', 2)->first();
        $cms_home3 = DB::table('pages')->where('id', 3)->first();
        $cms_home4 =DB::table('pages')->where('id', 4)->first();
        $cms_home5 =DB::table('pages')->where('id', 5)->first();
        $cms_home6 =DB::table('pages')->where('id', 6)->first();
        $help      =DB::table('pages')->where('id', 7)->first();
        $news      = DB::table('news')->get();
        $latest    =DB::table('pages')->where('id', 8)->first();
        $homecontact =DB::table('pages')->where('id', 9)->first();

     

        return view('index', compact('banner', 'cms_home1','cms_home2','cms_home3','cms_home4','cms_home5','cms_home6','help','news','latest','homecontact'));
    }
    

    public function contactUsSubmit(Request $request)
    {
        $inquiry = new inquiry;
        $inquiry->inquiries_fname = $request->fname;
        //$inquiry->inquiries_lname = $request->lname;
        $inquiry->inquiries_email = $request->email;
        $inquiry->inquiries_phone = $request->phone;
        $inquiry->extra_content = $request->message;
        $inquiry->subject = $request->subject;
        $inquiry->save();
            
        Session::flash('message', 'Thank you for contacting us. We will get back to you asap'); 
        Session::flash('alert-class', 'alert-success'); 
        return back();
    }


    public function TimesheetSubmit(Request $request)
      {
       if ($request->hasFile('file')) {
           $timesheet = new Timesheet;
            $timesheet->name = $request->name;
            $timesheet->phone = $request->phone;
            $timesheet->lookingFor = $request->lookingFor;
            $timesheet->Time = $request->Time;
            $timesheet->email = $request->email;
            $timesheet->subject = $request->subject; 
            $timesheet->job_id  = $request->job_id;
                  

              $file = $request->file('file');
                //make sure yo have image folder inside your public
                $resume_path = 'uploads/cv/';
                $fileName = $file->getClientOriginalName();
                $profileImage = date("Ymd").$fileName.".".$file->getClientOriginalExtension();

               //$request->file->move(public_path($resume_path) . DIRECTORY_SEPARATOR. $profileImage);
               $request->file->move(public_path('uploads/cv/'), $profileImage);

                $timesheet->file = $resume_path.$profileImage;
                 
                  
             $timesheet->save();
                //  dd($timesheet);
         }
                        // Email code starts here
                          $data = array();
                        $data['name'] = $timesheet->name;
                        $data['phone'] = $timesheet->phone;
                        $data['lookingFor'] = $timesheet->lookingFor;
                        $data['Time']  = $timesheet->Time;
                        $data['file']  = $timesheet->file;
                        $data['admin_email']=['Colin.G@Anvilrecruitment.uk','Cgriffiths@AnvilRecruitment.uk'];
                        
                            /*For Admin Order Email Method */
                        Mail::send('mailingtemplates.userOrderMail', ['data' => $data], function ($m) use ($data) {
                                $m->from('tomhardy.developer@gmail.com', 'Better Fit Home');
                                $m->to($data['admin_email'],'Better Fit Home')->subject('New Inquiry');
                        });
        
                        // Email code ends here
            
  
          Session::flash('message', 'Thank you for submitting your application. We will get back to you asap'); 
        Session::flash('alert-class', 'alert-success'); 
        return back();
    }


    public function newsletterSubmit(Request $request)
    {
        $is_email = newsletter::where('newsletter_email',$request->email)->count();
        
        if($is_email == 0) {
            
        $inquiry = new newsletter;
        //$inquiry->newsletter_name = $request->name;
        $inquiry->newsletter_email = $request->email;
        //$inquiry->newsletter_message = $request->comment;
        $inquiry->save();
        Session::flash('message', 'Thank you for contacting us. We will get back to you asap'); 
        Session::flash('alert-class', 'alert-success'); 
        return redirect('/');
        
        } else {
            Session::flash('flash_message', 'email already exists'); 
            Session::flash('alert-class', 'alert-success'); 
            return redirect('/');
        }
        
    }

    public function Job(){
        $job_board =DB::table('pages')->where('id', 12)->first();
        $innerbanner = DB::table('innerbanners')->where('id',3)->first();
        $type = DB::table('types')->get();
        $sector = DB::table('sectors')->get();

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


        /*$detail  = DB::table('jobs')->where('id', $id)->first();*/
        $featured = DB::table('jobs')->where('featured', '=', yes)->get();
        return view('job',compact('job_board','innerbanner','type','sector','job','featured'));
    }   
     public function Aboutus(){
        $innerbanner = DB::table('innerbanners')->where('id',1)->first();

        return view('aboutus',compact('innerbanner'));
    }

     public function Testimonial(){
        $innerbanner = DB::table('innerbanners')->where('id',4)->first();
        $testimonial = DB::table('pages')->where('id',10)->first();
        $testi= DB::table('testimonials')->get();
        return view('testimonial',compact('testi','testimonial','innerbanner'));
    }
     public function Timesheet(){

        $download=DB::table('pages')->where('id', 13)->first();
         $innerbanner = DB::table('innerbanners')->where('id',2)->first();
        $blank = DB::table('blanksheets')->where('id',1)->first();
        return view('time_sheet',compact('blank','download','innerbanner'));
    }
    public function Contact(){
    $innerbanner = DB::table('innerbanners')->where('id',5)->first();
 $contact = DB::table('pages')->where('id',11)->first();
        return view('contact',compact('contact','innerbanner'));

    }    public function JobDetail($id){
    $innerbanner = DB::table('innerbanners')->where('id',6)->first();
    $detail = DB::table('pages')->where('id',14)->first();
    $jobdetail = DB:: table('jobs')->where('id',$job_id)->first();
        return view('job_detail',compact('innerbanner','detail'));
    }

}
