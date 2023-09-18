<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Doctor;
use App\Models\User;
use App\Models\Major;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function index()
    {

        $doctors  = Doctor::count();
        $majors   = Major::count();
        $users    = User::normalUser()->get()->count();
        $bookings = Booking::booked()->get()->count();

        return view('admin.index', get_defined_vars());
    }



}
