<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDoctorRequest;
use App\Http\Requests\UpdateDoctorRequest;
use App\Http\traits\UploadFile;
use App\Models\Doctor;
use App\Models\Major;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    use UploadFile;

    public function index()
    {
        $doctors = Doctor::with('major')->latest()->paginate();
        return view('admin.pages.doctor.index',compact('doctors'));
    }

    public function create()
    {
        $majors = Major::get();
        return view('admin.pages.doctor.create',compact('majors'));

    }

    public function store(StoreDoctorRequest $request)
    {
        if($request->hasFile('image')) {
            $image_name = $this->UploadFile($request->file('image'),Doctor::IMAGE_PATH);
        }
        Doctor::create([
            'name'=>$request->name,
            'image'=>$image_name,
            'major_id'=>$request->major_id,
        ]);
        return redirect()->route('admin.doctor.index')->with(['success'=>'Doctor Created Successfully']);
    }

    public function edit(Doctor $doctor)
    {
        $majors = Major::get();
        return view('admin.pages.doctor.edit',compact('majors','doctor'));

    }

    public function update(UpdateDoctorRequest $request, Doctor $doctor)
    {
        if($request->hasFile('image')) {
            $this->DeleteFile($doctor->image ,Doctor::IMAGE_PATH);
            $image_name = $this->UploadFile($request->file('image'),Doctor::IMAGE_PATH);
        }
        $doctor->update([
            'name'=>$request->name,
            'image'=>$image_name ?? $doctor->image , //major-image is nullable
            'major_id'=>$request->major_id,
        ]);

        return redirect()->route('admin.doctor.index')->with(['updated'=>'Doctor Updated Successfully']);

    }

    public function softDelete(Doctor $doctor)
    {
        $doctor->delete();
        return redirect()->route('admin.doctor.index')->with(['soft_delete'=>'Doctor Archived Successfully']);
    }

    public function archive(){
        $doctors = Doctor::with('major')->onlyTrashed()->paginate();
        return view('admin.pages.doctor.archive',compact('doctors'));
    }

    public function restore( $doctor){
        Doctor::where('id' , $doctor)->restore();
        return redirect()->route('admin.doctor.index')->with(['restored'=>'Doctor restored Successfully']);

    }
    public function forceDelete(Doctor $doctor){
        $this->DeleteFile( $doctor->image ,Doctor::IMAGE_PATH);
        $doctor->forceDelete();
        return redirect()->back()->with(['force_delete'=>'Doctor Deleted Successfully']);

    }



}
