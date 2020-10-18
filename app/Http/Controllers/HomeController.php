<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware(['auth','email_verified'])->only('index');  //except('profile')
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function profile()
    {
        return view('post.profile');
    }

    public function uploadAvatar(Request $request)
    {
        if ($request->hasFile('avatar')) {
            $filename = $request->avatar->getClientOriginalName();
            // delete old image 
            if( Auth::user()->avatar != '') {
                Storage::disk('public')->delete('images/'.Auth::user()->avatar);
            }
            auth()->user()->update(
                ['avatar' => $filename] 
            );
            $request->avatar->storeAs('images', $filename, 'public');
            //$request->avatar->store('images','public');  //images-folder name inside storage
            return back()->with('status','File Uploaded successfully');
        }
    }
}
