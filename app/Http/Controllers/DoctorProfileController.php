<?php

namespace App\Http\Controllers;

use App\Mail\SendEmailBookSuccess;
use App\Models\Cart\Transaction;
use App\Models\Doctor;
use App\Models\User;
use App\Models\Vote;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DoctorProfileController extends Controller
{
    public function index(Request $request, $slug, $id)
    {
        $doctor    = Doctor::find($id);
        $votes     = Vote::with('user')->where('v_id', $id)->orderByDesc('id')->paginate(100);
        $totalVote = Vote::count('id');

        $viewData = [
            'doctor'    => $doctor,
            'votes'     => $votes,
            'totalVote' => $totalVote
        ];

        return view('pages.doctor.index', $viewData);
    }

    public function book(Request $request, $slug, $id)
    {
        $doctor    = Doctor::find($id);
        $votes     = Vote::with('user')->where('v_id', $id)->orderByDesc('id')->paginate(100);
        $totalVote = Vote::count('id');

        $viewData = [
            'doctor'    => $doctor,
            'votes'     => $votes,
            'totalVote' => $totalVote
        ];

        return view('pages.doctor.book', $viewData);
    }

    public function store(Request $request, $slug, $id)
    {
        $doctor = Doctor::find($id);
        if (!$doctor) return redirect()->back();

        $check = Transaction::where([
            't_time_key' => $request->time
        ])->whereDate('t_date', $request->date)
            ->first();

        if ($check) {
            // Set a warning toast, with no title
            toastr()->warning('Lịch này đã trùng, xin vui lòng chọn lịch mới');
            return redirect()->back();
        }

        $user = User::find(get_data_user('users'));

        $transaction = Transaction::create([
            't_user_id'     => get_data_user('users'),
            't_total_money' => $doctor->price,
            't_date'        => $request->date,
            't_time_text'   => $request->time_text,
            't_time_key'    => $request->time,
            'created_at'    => Carbon::now()
        ]);

        $sendEmailJob = new \App\Jobs\SendEmailBookSuccess($doctor, $user, $transaction);
        dispatch($sendEmailJob);

        return view('pages.doctor.success');
    }
}
