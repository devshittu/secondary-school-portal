<?php

namespace App\Http\Controllers;

use App\UserCandidateProfile;
use App\Utils\Constants;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

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
        // update score for candidate for is the current session from settings
        UserCandidateProfile::where('user_id', $id)
            ->update(['exam_score' => $request->score]);

        return redirect('home')->with('success_message', 'Score updated!');
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
                    UserCandidateProfile::where(Constants::DBC_USER_ID, Auth::id())
                        ->update([Constants::DBC_AVATAR => Constants::AVATAR_DOWNLOAD_PATH.$filename]);
                }
            }

        }
//        return Redirect::to("home")
//            ->withSuccess('Great! Profile picture has been successfully updated.');


        return redirect('home')->with('success_message', 'Profile updated!');
    }
}
