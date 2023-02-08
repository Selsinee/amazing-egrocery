<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $role = Role::where('role_id', $user->role_id)->first();
        $user->role_name = $role->role_name;
        return view('profile.index', compact('user'));
    }

    public function accountmaintenance(){
        $users = User::join('roles', 'roles.role_id', '=', 'users.role_id')
            ->get();

        return view('maintenance.index', compact('users'));
    }

    public function updateRole($id) {
        $user = User::find($id);
        $roles = Role::all();
        return view('maintenance.update', compact('user', 'roles'));
    }

    public function setRole(Request $request) {
        User::find($request->userId)->update([
            "role_id" => $request->role
        ]);
        return redirect('/accountmaintenance');
    }

    public function deleteUser($id){
        User::find($id)->delete();
        return redirect('/accountmaintenance');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate( [
            'firstName' => 'required|max:25|alpha_dash',
            'lastName' => 'required|max:25|alpha_dash',
            'email' => 'required|email',
            'gender' => 'required',
            'displayPicture' => 'required|mimes:jpg,png,jpeg,svg',
            'password' => 'required|min:8|regex:/[0-9]/',
            'confirmPassword' => 'required_with:password|same:password|min:8|regex:/[0-9]/'
        ]);

        $file = $request->file('displayPicture');
        $fileName = $file->getClientOriginalName();
        $request->file('displayPicture')->move(public_path('assets/'), $fileName);

        User::find(Auth::user()->id)->update([
            'gender_id' => $request->gender,
            'first_name' => $request->firstName,
            'last_name' => $request->lastName,
            'email' => $request->email,
            'display_picture_link' => $fileName,
            'password' => bcrypt($request->password),
        ]);

        return redirect('saved');
    }

}
