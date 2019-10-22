<?php

namespace App\Http\Controllers;

use App\ClassTerm;
use App\User;
use App\UserCandidateProfile;
use App\UserStudentProfile;
use App\UserStudentTransitionLog;
use App\Utils\Constants;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Console\Input\Input;

class UsersController extends Controller
{
//    candidate_score_update


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function candidate_score_update(Request $request, $id)
    {
        $offer = isset($request->query()['offer']) ? $request->query()['offer'] : null;
        $candidateProfile = UserCandidateProfile::where('user_id', $id);

        $messagePlus = '';
        if(!is_null($offer))
        {
            // update score for candidate for is the current session from settings
            $candidateProfile
                ->update([
                    'exam_score' => $request->score,
                    Constants::DBC_IS_ADMITTED => $offer
                    ]);
            $messagePlus = 'Has been offered admission. Tell them to log in to their account and accept admission. ';
        } else $candidateProfile->update(['exam_score' => $request->score]);

        return redirect('home')->with('success_message', 'Score updated! ' . $messagePlus);
    }

    /**
     * This is where we'll convert the authenticated candidate to full student
     * We do this by simply copying over the candidate details in to student tb
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function candidateAcceptAdmission(Request $request)
    {
        $candidateProfile = UserCandidateProfile::where('user_id', Auth::id())->first();


        DB::beginTransaction();

        $oldFileName = Auth::user()->avatar;
        $newFileName = 'avatar/'. get_reg_code_prefix(Constants::DBCV_USER_TYPE_STUDENT) . substr(Auth::user()->avatar, 11);

        if (!is_null($oldFileName)) {
            $rename = rename(storage_path('app/public/'.$oldFileName), storage_path('app/public/'.$newFileName));
            if (!$rename)  DB::rollBack();

        } else $newFileName = null;

        $updateUserId = User::where('id', Auth::id())
            ->update([
                Constants::DBC_USER_TYPE => Constants::DBCV_USER_TYPE_STUDENT,
                Constants::DBC_REF_REG_CODE => get_reg_code_prefix(Constants::DBCV_USER_TYPE_STUDENT).  get_reg_code_code(Auth::user()->reg_code),
                'avatar' => $newFileName,
            ]);

        if(!$updateUserId) DB::rollBack();

        $createStudentProfile = UserStudentProfile::create([
            'user_id' => Auth::id(),
            Constants::DBC_ENROLL_SESS_ID => $candidateProfile->academic_session_id,
            Constants::DBC_ENROLL_CLASS_ID => $candidateProfile->academic_class_id,
            ]);
        if (!$createStudentProfile)  DB::rollBack();
        $classTerm = ClassTerm::where('academic_class_id', $candidateProfile->academic_class_id)->first();

        $createStudentTransitionLog = UserStudentTransitionLog::create([
            'user_id' => Auth::id(),
            Constants::DBC_ACAD_SESS_ID => $candidateProfile->academic_session_id,
            Constants::DBC_CLASS_TERM_ID => $classTerm->id,
        ]);

        if (!$createStudentTransitionLog)  DB::rollBack();
        $affectedRows = UserCandidateProfile::where('user_id', Auth::id())->delete();


        DB::commit();

        return redirect('home')->with('success_message', 'Great! Your account has been successfully converted to full student account.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function avatar_update(Request $request)
    {
        request()->validate([
            Constants::DBC_AVATAR => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $filename = '';


        if ($files = $request->file(Constants::DBC_AVATAR)) {
            $destinationPath = Constants::AVATAR_UPLOAD_PATH; // upload path
            $filename = Auth::user()->reg_code . "." . $files->getClientOriginalExtension();

            $filePath = $request->avatar->storeAs($destinationPath, $filename); // it return the path at which the file is now save

            if ($request->avatar->isValid()) {
//                dd('upload_sux');
                if (Auth::user()->type === Constants::DBCV_USER_TYPE_CANDIDATE) {
                    User::where(Constants::DBC_REF_ID, Auth::id())
                        ->update([Constants::DBC_AVATAR => Constants::AVATAR_DOWNLOAD_PATH.$filename]);
                }
            }

        }

        return redirect('home')->with('success_message', 'Profile updated!');
    }
}
