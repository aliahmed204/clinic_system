<?php

namespace App\Http\Controllers\EndUser;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Major;
use Illuminate\Http\Request;

class DoctorController extends Controller
{

    public function index()
    {
        $doctors = Doctor::with('major')->latest()->paginate(12);
        $majors = Major::limit(5)->get();
        return view('EndUser.pages.doctors.index',compact('doctors','majors'));
    }
    public function majorDoctor($major)
    {
        $doctors = Doctor::where('major_id' ,$major)->with('major')->paginate();
        return view('EndUser.pages.doctors.index',compact('doctors'));
    }

    public function show(string $id)
    {
        $doctor = Doctor::findOrFail($id);
        return view('EndUser.pages.doctors.doctor',compact('doctor'));
    }

    /*public function store(Request $request)
    {
        dd($request->input('rating'));
        // Validate the request
        $request->validate([
            'rating' => 'required|integer|between:1,5',
        ]);

        // Save the rating to database


        // Redirect
        return redirect()->back()->with('success', 'Rating submitted successfully!');// think you for ...
    }*/

}
