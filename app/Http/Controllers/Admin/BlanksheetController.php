<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Blanksheet;
use Illuminate\Http\Request;
use Image;
use File;

class BlanksheetController extends Controller
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
        $model = str_slug('blanksheet','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $blanksheet = Blanksheet::where('timesheet', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $blanksheet = Blanksheet::paginate($perPage);
            }

            return view('admin.blanksheet.index', compact('blanksheet'));
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
        $model = str_slug('blanksheet','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('admin.blanksheet.create');
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
        $model = str_slug('blanksheet','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            $this->validate($request, [
			'timesheet' => 'required'
		]);

            $blanksheet = new blanksheet($request->all());

                  if ($request->hasFile('timesheet')) {

                $file = $request->file('timesheet');
                //make sure yo have image folder inside your public
                $resume_path = 'uploads/blanksheets/';
                $fileName = $file->getClientOriginalName();
                $profileImage = date("Ymd").$fileName.".".$file->getClientOriginalExtension();

               //$request->file->move(public_path($resume_path) . DIRECTORY_SEPARATOR. $profileImage);
               $request->timesheet->move(public_path('uploads/blanksheets/'), $profileImage);

                $blanksheet->timesheet = $resume_path.$profileImage;
            }
            $blanksheet->save();

            return redirect('admin/blanksheet')->with('flash_message', 'Blanksheet added!');
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
        $model = str_slug('blanksheet','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $blanksheet = Blanksheet::findOrFail($id);
            return view('admin.blanksheet.show', compact('blanksheet'));
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
        $model = str_slug('blanksheet','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $blanksheet = Blanksheet::findOrFail($id);
            return view('admin.blanksheet.edit', compact('blanksheet'));
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
        $model = str_slug('blanksheet','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $this->validate($request, [
			'timesheet' => 'required'
		]);
            $requestData = $request->all();
            

        if ($request->hasFile('image')) {
            
            $blanksheet = blanksheet::where('id', $id)->first();
            $image_path = public_path($blanksheet->image); 
            
            if(File::exists($image_path)) {
                File::delete($image_path);
            }

            $file = $request->file('image');
            $fileNameExt = $request->file('image')->getClientOriginalName();
            $fileNameForm = str_replace(' ', '_', $fileNameExt);
            $fileName = pathinfo($fileNameForm, PATHINFO_FILENAME);
            $fileExt = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $fileName.'_'.time().'.'.$fileExt;
            $pathToStore = public_path('uploads/blanksheets/');
            Image::make($file)->save($pathToStore . DIRECTORY_SEPARATOR. $fileNameToStore);

             $requestData['image'] = 'uploads/blanksheets/'.$fileNameToStore;               
        }


            $blanksheet = Blanksheet::findOrFail($id);
             $blanksheet->update($requestData);

             return redirect('admin/blanksheet')->with('flash_message', 'Blanksheet updated!');
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
        $model = str_slug('blanksheet','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            Blanksheet::destroy($id);

            return redirect('admin/blanksheet')->with('flash_message', 'Blanksheet deleted!');
        }
        return response(view('403'), 403);

    }
}
