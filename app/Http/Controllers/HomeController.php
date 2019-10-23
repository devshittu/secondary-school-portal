<?php

namespace App\Http\Controllers;

use App\AcademicSubject;
use App\ClassSubject;
use App\StudentTerminalLog;
use App\User;
use App\UserAdminProfile;
use App\UserCandidateProfile;
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
//            dd($studentTerminalLog->student_terminal_log_subjects);
//            foreach($studentTerminalLog->student_terminal_log_subjects as $subject) {
//                dump($subject);
//                dump($subject->academic_subject->title);
//            }
//            $classSubjectIds = ClassSubject::where(Constants::DBC_ACAD_CLASS_ID, $studentTerminalLog->class_term->academic_class_id)->get()->pluck(Constants::DBC_ACAD_SUBJECT_ID);
//            $subjects = AcademicSubject::whereIn(Constants::DBC_REF_ID, $classSubjectIds)->get();
//            $data['subjects'] = $subjects;

//            dd($studentTerminalLog->class_term->academic_class_id, $classSubjectIds, $subjects);

        }


        $path = '/dashboard_' . Auth::user()->type . '.home';
        return view($path, $data);
    }
}
