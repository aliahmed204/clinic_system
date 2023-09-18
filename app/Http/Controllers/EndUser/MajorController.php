<?php

namespace App\Http\Controllers\EndUser;

use App\Http\Controllers\Controller;
use App\Models\Major;

class MajorController extends Controller
{

    public function index()
    {
        $majors  = Major::latest()->paginate();
        return view('EndUser.pages.majors.index',compact('majors'));
    }
}
