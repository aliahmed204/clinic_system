<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MangageMajorRequest;
use App\Http\traits\UploadFile;
use App\Models\Major;
use Illuminate\Http\Request;

class MajorController extends Controller
{
    use UploadFile;

    public function index()
    {
        $majors = Major::with('doctors')->latest()->paginate();
        return view('admin.pages.major.index',compact('majors'));//
    }

    public function create()
    {
        $majors = Major::get();
        return view('admin.pages.major.create',compact('majors'));
    }

    public function store(MangageMajorRequest $request)
    {
        if($request->hasFile('image')) {
            $image_name = $this->UploadFile($request->file('image'),Major::Major_PATH);
        }
        Major::create([
            'title'=>$request->title,
            'image'=>$image_name,
        ]);
        return redirect()->route('admin.major.index')->with(['success'=>'major Created Successfully']);
    }

    public function show(Major $major){
        return view('admin.pages.major.show',compact('major'));
    }

    public function edit(Major $major)
    {
        $majors = Major::get();
        return view('admin.pages.major.edit',compact('major','majors'));
    }

    public function update(MangageMajorRequest $request, Major $major)
    {
        if($request->hasFile('image')) {
            $this->DeleteFile($major->image ,Major::Major_PATH);
            $image_name = $this->UploadFile($request->file('image'),Major::Major_PATH);
        }
        $major->update([
            'title'=>$request->title,
            'image'=>$image_name ?? $major->image ,
        ]);
        return redirect()->route('admin.major.index')->with(['updated'=>'major Updated Successfully']);
    }

    public function destroy(Major $major)
    {
        $this->DeleteFile( $major->image ,Major::Major_PATH);
        $major->delete();
        return redirect()->back()->with(['deleted'=>'major Deleted Successfully']);
    }
}
