<?php

namespace App\Http\Controllers\EndUser;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookingRequest;
use App\Http\traits\UploadFile;
use App\Mail\BookingMail;
use App\Models\Booking;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class BookingController extends Controller
{
    use UploadFile;

    /**
     * Display a listing of the resource.
     */
    public function bookData(BookingRequest $request){

        $user = User::findOrFail($request->user_id);

        $data = [
            'name' => $request->name,
            'phone'=> $request->phone,
            'email'=> $request->email,
            'booking_date'=> $request->booking_date
        ];
        Booking::create([
            'user_id' => $request->user_id,
            'doctor_id' => $request->doctor_id,
            'booking_date' => date('Y-m-d' , strtotime($request->booking_date)),
            'status' => 0,
        ]);

        Mail::to($user)->send(New BookingMail($data));

        return redirect()->back()->with(['Booked'=> ' Date Booked With Doctor']);
    }


}
