<?php

namespace App\Http\Controllers;

use App\Models\Cart\Transaction;
use App\Models\Doctor;
use App\Models\User;
use App\Models\Vote;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class VoteController extends Controller
{
    public function store(Request $request, $id)
    {
        try {
            $vote            = new Vote();
            $vote->v_user_id = get_data_user('users');
            $vote->v_id      = $id;
            $vote->v_number  = $request->v_number;
            $vote->v_content = $request->v_content;
            $vote->save();

            if ($vote->id) {
                $doctor = Doctor::find($id);
                if ($doctor)
                {
                    $doctor->vote_number += $request->v_number;
                    $doctor->vote_total  += 1;
                    $doctor->save();
                }
            }

            return redirect()->back();
        } catch (\Exception $exception) {
            Log::error("[processVote] : ". $exception->getMessage());
            return redirect()->back();
        }
    }
}
