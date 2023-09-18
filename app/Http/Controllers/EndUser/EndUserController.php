<?php

namespace App\Http\Controllers\EndUser;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Major;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EndUserController extends Controller
{

    public function index()
    {
        $doctors = Doctor::with('major')
            ->select('major_id',DB::raw('MIN(id) as id'),DB::raw('MAX(name) as name'))
            ->groupBy('major_id')
            ->get()
            ->toArray();
        $majors  = Major::limit(12)->get();
        return view('EndUser.index',compact('doctors','majors'));

    }

}
