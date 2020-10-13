<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Job;
use App\Type;
use App\Sector;
use Illuminate\Http\Request;
use Image;
use File;

class JobController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */

    public function index(Request $request)
    {
        $model = str_slug('job','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $job = Job::where('title', 'LIKE', "%$keyword%")
                ->leftjoin('type', 'job.type', '=', 'type.type')
                ->orWhere('city', 'LIKE', "%$keyword%")
                ->orWhere('company', 'LIKE', "%$keyword%")
                ->orWhere('status', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $job = Job::paginate($perPage);
            }

            return view('admin.job.index', compact('job'));
        }
        return response(view('403'), 403);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $model = str_slug('job','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            $items = Type::pluck('type', 'type');
             $sectors = Sector::pluck('sector', 'sector');
            return view('admin.job.create',compact('items','sectors'));
        }
        return response(view('403'), 403);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $model = str_slug('job','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            

            $job = new job($request->all());
            $job->type = $request->input('item_id'); 
             $job->sector = $request->input('sector_id'); 

            if ($request->hasFile('image')) {

                $file = $request->file('image');
                
                //make sure yo have image folder inside your public
                $job_path = 'uploads/jobs/';
                $fileName = $file->getClientOriginalName();
                $profileImage = date("Ymd").$fileName.".".$file->getClientOriginalExtension();

                Image::make($file)->save(public_path($job_path) . DIRECTORY_SEPARATOR. $profileImage);

                $job->image = $job_path.$profileImage;
            }
            
            $job->save();

            return redirect('admin/job')->with('flash_message', 'Job added!');
        }
        return response(view('403'), 403);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $model = str_slug('job','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $job = Job::findOrFail($id);
            return view('admin.job.show', compact('job'));
        }
        return response(view('403'), 403);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $model = str_slug('job','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $items = Type::pluck('type', 'type');
            $sectors = Sector::pluck('sector', 'sector');
            $job = Job::findOrFail($id);
            return view('admin.job.edit', compact('job','items','sectors'));
        }
        return response(view('403'), 403);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $model = str_slug('job','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            
            $requestData = $request->all();
            $requestData['type'] = $request->input('item_id');
             $requestData['sector'] = $request->input('sector_id');
           
            

        if ($request->hasFile('image')) {
            
            $job = job::where('id', $id)->first();
            $image_path = public_path($job->image); 
            
            if(File::exists($image_path)) {
                File::delete($image_path);
            }

            $file = $request->file('image');
            $fileNameExt = $request->file('image')->getClientOriginalName();
            $fileNameForm = str_replace(' ', '_', $fileNameExt);
            $fileName = pathinfo($fileNameForm, PATHINFO_FILENAME);
            $fileExt = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $fileName.'_'.time().'.'.$fileExt;
            $pathToStore = public_path('uploads/jobs/');
            Image::make($file)->save($pathToStore . DIRECTORY_SEPARATOR. $fileNameToStore);

             $requestData['image'] = 'uploads/jobs/'.$fileNameToStore;               
        }


            $job = Job::findOrFail($id);
             $job->update($requestData);

             return redirect('admin/job')->with('flash_message', 'Job updated!');
        }
        return response(view('403'), 403);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $model = str_slug('job','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            Job::destroy($id);

            return redirect('admin/job')->with('flash_message', 'Job deleted!');
        }
        return response(view('403'), 403);

    }

   

 
}
