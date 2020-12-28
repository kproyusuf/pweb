<?php

namespace App\Http\Controllers\Pemilik;

use App\User;
use App\Models\Job;
use App\Models\Offer;
use App\Models\Owner;
use App\models\Users;
use App\Models\Payment;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class WorkerController extends Controller
{
    public function index($id)
    {
        $job = Job::where('job_status', '!=', '3')->get();
        $job_id = Job::find($id);
        $users = Users::where('job_id', '=', $id)->get();
        return view('pemilik.lamaran.index')->with('users', $users);
    }
    public function view($id)
    {
        $users = users::find($id);
        return view('pemilik.lamaran.view')->with('users', $users);
    }
    public function update(Request $request, $id)
    {
        $owner_id = Auth::user()->id;
        $users = Users::find($id);
        $payment = new Payment();
        $payment->user_id = $id;
        $payment->job_id = $request->input('job_id');
        $payment->owner_id = $owner_id;
        $users->ownerver = $request->input('ownerver');
        if ($users->ownerver == '0') {
            $payment->save();
            $users->update();
            return redirect()->back()->with('status', 'Lowongan berhasil di update');
        } else {
            $users->update();
            return redirect()->back()->with('status', 'Lowongan berhasil di update');
        }
    }
    public function cancel(Request $request, $id)
    {
        $owner_id = Auth::user()->id;
        // $users = Users::where('job_id', '=', $id)->get();
        $user = User::findOrFail($id);
        $payment = Payment::where('user_id', '=', $id)->where('owner_id', '=', $owner_id)->firstOrFail();
        $payment->status = '0';
        $user->workerver = '1';
        $user->job_id = '0';
        $user->ownerver = '1';
        $user->update();
        $payment->update();
        return redirect()->back()->with('status', 'Pekerja Telah diberhentikan');
    }
}
