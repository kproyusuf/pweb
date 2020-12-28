<?php

namespace App\Http\Controllers\Pencari;

use App\Models\Job;
use App\Models\Offer;
use App\models\Users;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;

class SendController extends Controller
{

    public function sendrequest(Request $request, $id)
    {
        $user_id = Auth::user()->id;
        $user = User::findOrFail($user_id);
        $user->workerver = $request->input('workerver');
        if ($user->job_id == '0') {
            $user->job_id = $request->input('job_id');
            $user->update();
            return redirect()->back()->with('status2', 'Lamaran Telah Dikirim');
        } else {
            return redirect()->back()->with('status1', 'Anda hanya dapat mengirim satu lamaran dalam satu waktu');
        }
    }

    public function application(Request $request)
    {
        //$worker = Job::where('job_status', '!=', '3')->get();
        $user_id = Auth::user()->id;
        $job_id = Users::find($user_id)->job_id;
        $job = job::where('id', '=', $job_id)->get();
        $user = User::findOrFail($user_id);
        return view('pencari.proses-lamaran')->with('job', $job)->with('user', $user);
    }
    public function cancel(Request $request)
    {
        $user_id = Auth::user()->id;
        $user = User::findOrFail($user_id);
        if ($user->ownerver == '0') {
            $user->workerver = '1';
            $user->update();
            return redirect()->back()->with('status2', 'Menunggu Persetujuan Pemilik');
        } else {
            return redirect()->back()->with('status1', 'Lamaran Telah Dibatalkan');
        }
    }

    public function joboffer(Request $request)
    {
        $user_id = Auth::user()->id;
        $offer = Offer::where('user_id', '=', $user_id)->get();
        $user = User::findOrFail($user_id);
        // $users = Users::where('job_id', '<=', $user)->get();
        // $worker = $users->count();
        return view('pencari.tawaran.index')->with('offer', $offer);
    }
    public function accept(Request $request, $id)
    {
        $user_id = Auth::user()->id;
        $user = User::findOrFail($user_id);
        if ($user->job_id == '0') {
            $payment = new Payment();
            $payment->user_id = $user_id;
            $payment->job_id = $id;
            $payment->owner_id = $request->input('owner_id');
            $user->job_id = $id;
            $user->ownerver = '0';
            $user->workerver = '0';
            $user->update();
            $offer = Offer::where('job_id', '=', $id)->where('user_id', '=', $user_id);
            $payment->save();
            $offer->delete();
            return redirect()->back()->with('status2', 'Tawaran Telah Diterima');
        } else {
            return redirect()->back()->with('status1', 'Anda hanya dapat menerima satu tawaran dalam satu waktu');
        }
    }
}
