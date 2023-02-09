<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::simplePaginate(10);
        return view('home.index', compact('items'));
    }

    public function logout(Request $request) {
        Auth::guard()->logout();

        $request->session()->invalidate();

        return view('logout.index');
    }

    public function login(Request $request){
        if (Auth::attempt($request->only('email', 'password'))) {
            $request->session()->regenerate();
            return redirect('/home');
        }
        return redirect('/login')->withErrors([
            '*' => 'Wrong Email/Password. Please Check Again.'
        ]);
    }

    public function changeLanguage(Request $request){
        session()->put('lang', $request->lang);

        return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $request->validate( [
            'firstName' => 'required|max:25|alpha_dash',
            'lastName' => 'required|max:25|alpha_dash',
            'email' => 'required|email',
            'role' => 'required',
            'gender' => 'required',
            'displayPicture' => 'required|mimes:jpg,png,jpeg,svg',
            'password' => 'required|min:8|regex:/[0-9]/',
            'confirmPassword' => 'required_with:password|same:password|min:8|regex:/[0-9]/'
        ]);

        $file = $request->file('displayPicture');
        $fileName = $file->getClientOriginalName();
        $request->file('displayPicture')->move(public_path('assets/'), $fileName);

        User::create([
            'role_id' => $request->role,
            'gender_id' => $request->gender,
            'first_name' => $request->firstName,
            'last_name' => $request->lastName,
            'email' => $request->email,
            'display_picture_link' => $fileName,
            'password' => bcrypt($request->password),
        ]);

        return redirect('/login');

    }

    public function showRegisterPage() {
        $roles = Role::all();
        return view('register.index', compact('roles'));
    }

    public function showLoginPage() {
        return view('login.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Item::where('item_id', $id)->first();
        return view('home.detail', compact('item'));
    }

}
