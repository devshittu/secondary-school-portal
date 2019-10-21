<?php

namespace App\Http\Controllers;

use App\User;
use App\UserAdminProfile;
use App\UserCandidateProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //for authentication
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        $student = User::all();

        $data = [];

        if (Auth::user()->type === 'admin') {
            $profile = UserAdminProfile::where('user_id', Auth::id())->first();
            $data['profile'] = $profile;
            $data['users'] = $student;
            $data['user'] = $user;
        }
        elseif (Auth::user()->type === 'candidate') {
            $profile = UserCandidateProfile::where('user_id', Auth::id())->first();
            $data['profile'] = $profile;
        }


        $path = '/dashboard_' . Auth::user()->type . '.home';
        return view($path, $data);
    }
}
