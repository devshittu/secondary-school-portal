<?php

namespace App\Http\Controllers;

use App\UserCandidateProfile;
use Illuminate\Http\Request;

class UsersController extends Controller
{
//    candidate_score_update


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function candidate_score_update(Request $request, $id)
    {
        // update score for candidate for is the current session from settings
        UserCandidateProfile::where('user_id', $id)
            ->update(['exam_score' => $request->score]);

        return redirect('home')->with('success_message', 'Score updated!');
    }
}
