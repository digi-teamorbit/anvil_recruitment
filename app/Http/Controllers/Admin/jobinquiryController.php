<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\jobinquiry;
use Illuminate\Http\Request;
use Image;
use File;

class jobinquiryController extends Controller
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
        $model = str_slug('jobinquiry','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $jobinquiry = jobinquiry::where('name', 'LIKE', "%$keyword%")
                ->orWhere('phone', 'LIKE', "%$keyword%")
                ->orWhere('lookingFor', 'LIKE', "%$keyword%")
                ->orWhere('Time', 'LIKE', "%$keyword%")
                ->orWhere('email', 'LIKE', "%$keyword%")
                ->orWhere('subject', 'LIKE', "%$keyword%")
                ->orWhere('file', 'LIKE', "%$keyword%")
                ->orWhere('job_id', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $jobinquiry = jobinquiry::paginate($perPage);
            }

            return view('admin.jobinquiry.index', compact('jobinquiry'));
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
        $model = str_slug('jobinquiry','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
          
            return view('admin.jobinquiry.create');
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
        $model = str_slug('jobinquiry','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            

            $jobinquiry = new jobinquiry($request->all());

            if ($request->hasFile('image')) {

                $file = $request->file('image');
                
                //make sure yo have image folder inside your public
                $jobinquiry_path = 'uploads/jobinquirys/';
                $fileName = $file->getClientOriginalName();
                $profileImage = date("Ymd").$fileName.".".$file->getClientOriginalExtension();

                Image::make($file)->save(public_path($jobinquiry_path) . DIRECTORY_SEPARATOR. $profileImage);

                $jobinquiry->image = $jobinquiry_path.$profileImage;
            }
            
            $jobinquiry->save();

            return redirect('admin/jobinquiry')->with('flash_message', 'jobinquiry added!');
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
        $model = str_slug('jobinquiry','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $jobinquiry = jobinquiry::findOrFail($id);
            return view('admin.jobinquiry.show', compact('jobinquiry'));
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
        $model = str_slug('jobinquiry','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $jobinquiry = jobinquiry::findOrFail($id);
            return view('admin.jobinquiry.edit', compact('jobinquiry'));
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
        $model = str_slug('jobinquiry','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            
            $requestData = $request->all();
            

        if ($request->hasFile('image')) {
            
            $jobinquiry = jobinquiry::where('id', $id)->first();
            $image_path = public_path($jobinquiry->image); 
            
            if(File::exists($image_path)) {
                File::delete($image_path);
            }

            $file = $request->file('image');
            $fileNameExt = $request->file('image')->getClientOriginalName();
            $fileNameForm = str_replace(' ', '_', $fileNameExt);
            $fileName = pathinfo($fileNameForm, PATHINFO_FILENAME);
            $fileExt = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $fileName.'_'.time().'.'.$fileExt;
            $pathToStore = public_path('uploads/jobinquirys/');
            Image::make($file)->save($pathToStore . DIRECTORY_SEPARATOR. $fileNameToStore);

             $requestData['image'] = 'uploads/jobinquirys/'.$fileNameToStore;               
        }


            $jobinquiry = jobinquiry::findOrFail($id);
             $jobinquiry->update($requestData);

             return redirect('admin/jobinquiry')->with('flash_message', 'jobinquiry updated!');
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
        $model = str_slug('jobinquiry','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            jobinquiry::destroy($id);

            return redirect('admin/jobinquiry')->with('flash_message', 'jobinquiry deleted!');
        }
        return response(view('403'), 403);

    }
}
