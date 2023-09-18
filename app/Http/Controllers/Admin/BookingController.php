<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\traits\UploadFile;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    use UploadFile;

    public function index(){
        $bookings = Booking::with('doctor','user')
            ->orderBy('status','asc')->orderBy('booking_date','asc')
            ->paginate();
        return view('admin.pages.booking.index',compact('bookings'));
    }
    public function bookedDate(){
        $bookings = Booking::booked()->with('doctor')->with('user')->latest()->paginate();
        return view('admin.pages.booking.booked',compact('bookings'));
    }
    public function detectedDate(){
        $bookings = Booking::detected()->with('doctor')->with('user')->latest()->paginate();
        return view('admin.pages.booking.detected',compact('bookings'));
    }

    public function update(Booking $booking){
        $booking->update([
            'status'=> '1',
        ]);
        return redirect()->route('admin.booking.index')->with(['updated'=>'Booking Updated Successfully']);
    }

    public function destroy(Booking $booking)
    {
        $booking->delete();
        return redirect()->back()->with(['deleted'=>'Booking Deleted Successfully']);
    }
}
