<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ManageUserRequest;
use App\Models\Booking;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $users = User::with('bookings')->latest()->paginate();
        return view('admin.pages.user.index',compact('users'));
    }
    public function showAdmins(){
        $users = User::admin()->super()->with('bookings')->latest()->paginate();
        return view('admin.pages.user.showAdmins',compact('users'));
    }
    public function makeRoleUser(User $user){
        $user->update([ 'role'=> 'user']);
        return redirect()->back()->with(['role'=>'Role Updated Successfully']);
    }
    public function showUsers(){
        $users = User::normalUser()->with('bookings')->latest()->paginate();
        return view('admin.pages.user.showUsers',compact('users'));
    }
    public function makeRoleAdmin(User $user){
        try {
            $user->update(['role' => 'admin']);
            return redirect()->route('admin.user.showUsers')->with('role', 'Role Updated Successfully');
        } catch (\Exception $e) {
            return redirect()->route('admin.user.showUsers')->with('error', 'Role Update Failed');
        }
    }

    public function create(){
        return view('admin.pages.user.create');
    }

    public function store(ManageUserRequest $request){
        User::create( $request->except('_token') );
        return redirect()->route('admin.user.index')->with(['success'=>'User Created Successfully']);
    }

    public function show(User $user){
        $bookings = Booking::where('user_id',$user->id)->get();
        return view('admin.pages.user.show',compact('user','bookings'));
    }

    public function edit(User $user){
        return view('admin.pages.user.edit',compact('user'));
    }

    public function update(ManageUserRequest $request, User $user){
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password ?? $user->password,
            'phone' => $request->phone ,
        ]);
        return redirect()->route('admin.user.index')->with(['updated'=>'User Updated Successfully']);
    }

    public function destroy( User $user){
        $user->delete();
        return redirect()->back()->with(['deleted'=>'User Deleted Successfully']);
    }
}
