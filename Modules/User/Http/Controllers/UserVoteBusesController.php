<?php

namespace Modules\User\Http\Controllers;

use App\Models\Cart\Transaction;
use App\Models\User;
use App\Models\Vote;
use App\Models\VoteDetail;
use App\Traits\MessageTrait;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Log;

class UserVoteBusesController extends Controller
{
    use MessageTrait;

    public function index($id)
    {
        $transaction = Transaction::findOrFail($id);
        $checkVote   = Vote::where([
            'v_user_id' => get_data_user('users'),
            'v_id'      => $id
        ])->first();

        if ($checkVote) {
            $this->showMessagesError("Bạn không thể đánh giá nhà xe này lần hai");
//            return redirect()->back();
        }
        return view('user::vote.vote', compact('transaction'));
    }

    public function processVote(Request $request, $id)
    {
        try {
            $transaction     = Transaction::findOrFail($id);
            $user            = User::findOrFail($transaction->t_user_id);
            $vote            = new Vote();
            $vote->v_user_id = get_data_user('users');
            $vote->v_id      = $user->id;
            $vote->v_number  = $request->vote;
            $vote->v_content = $request->content_vote;
            $vote->save();
            if ($vote->id) {
                $user->vote_number += $request->vote;
                $user->vote_total  += 1;
                $user->save();
            }

            $this->showMessagesSuccess("Gửi đánh giá thành công");
            $this->voteDetail($request, $user);
        } catch (\Exception $exception) {
            $this->showMessagesError("Gủi đánh giá thất bại");
            Log::error("[processVote] : ". $exception->getMessage());
            return redirect()->back();
        }

        return redirect()->route('get_user.ticket');
    }

    protected function voteDetail($request, $user)
    {
        $typeVote = (new VoteDetail())->getType();
        foreach ($typeVote as $key => $item) {
            $attribute = $item['attribute'];
            VoteDetail::create([
                'v_user_id' => get_data_user('users'),
                'v_id'      => $user->id,
                'v_number'  => $request->$attribute,
                'v_type'    => $key
            ]);
        }
    }
}
