<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class SettingController extends Controller
{
    public function home(){
        $settings = Setting::where('status' , '1')->get();
        return view('admin.pages.setting.home',compact('settings'));
    }

    public function homeUpdate( Request $request, Setting $setting){
        $request->validate(['value'=> 'string',]);
        $setting->update(['value'=> $request->value,]);
        Cache::forget('settings');
        return back()->with(['success'=>'setting updated']);
    }
}
