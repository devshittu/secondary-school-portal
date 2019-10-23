<?php

namespace App\Http\Controllers;

use App\AcademicSubject;
use App\ClassStaff;
use App\ClassSubject;
use App\StudentTerminalLog;
use App\User;
use App\UserAdminProfile;
use App\UserCandidateProfile;
use App\UserStaffProfile;
use App\UserStudentProfile;
use App\Utils\Constants;
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

        elseif (Auth::user()->type === Constants::DBCV_USER_TYPE_STUDENT) {
            $profile = UserStudentProfile::where('user_id', Auth::id())->first();
            $data['profile'] = $profile;

            $studentTerminalLog = StudentTerminalLog::where(Constants::RQ_USER_ID, Auth::id())->first();
            $data['subjects'] = $studentTerminalLog->student_terminal_log_subjects;

        }

        elseif (Auth::user()->type === Constants::DBCV_USER_TYPE_STAFF) {
            $profile = UserStaffProfile::where('user_id', Auth::id())->first();
            $data['profile'] = $profile;

//            $studentTerminalLog = StudentTerminalLog::where(Constants::RQ_USER_ID, Auth::id())->first();
//            $data['students'] = $studentTerminalLog->student_terminal_log_subjects;
            $data['classes'] = ClassStaff::where('user_id', Auth::id())->get();//->pluck(Constants::DBC_ACAD_CLASS_ID);

//            foreach ($data['classes'] as $class) {
//                dump($class, $class->academic_class->title);
//            }

//            dd($data['classes']);

        }


        $path = '/dashboard_' . Auth::user()->type . '.home';
        return view($path, $data);
    }
}
