<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Offer;
use App\Models\Payment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class AdminController extends Controller
{
    public function index()
    {
        $payment = Payment::where('status', '!=', '3')->get();
        return view('admin.dashboard')->with('payment', $payment);
    }

    public function paymentver($id)
    {
        $payment = Payment::find($id);
        $payment->adminver = '0'; //3 data yang dihapus
        $payment->update();

        return redirect()->back()->with('status', 'Pembayaran Telah di Verifikasi');
    }
    public function myprofile()
    {

        return view('admin.profil');
    }

    public function profilupdate(Request $request)
    {
        $user_id = Auth::user()->id;
        $user = User::findOrFail($user_id);
        $user->name = $request->input('fname');
        $user->lname = $request->input('lname');
        $user->address = $request->input('address');
        $user->phone = $request->input('phone');

        if ($request->hasFile('foto')) {
            $destination = 'uploads/profile/' . $user->picture;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $file = $request->file('foto');
            $extention = $file->getClientOriginalExtension();
            $f_filename = time() . '.' . $extention;
            $file->move('uploads/profile/', $f_filename);
            $user->picture = $f_filename;
        }

        if ($request->hasFile('resume')) {
            $destination = 'uploads/resume/' . $user->resume;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $file = $request->file('resume');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move('uploads/resume/', $filename);
            $user->resume = $filename;
        }
        $user->no_rek = $request->input('no_rek');
        $user->update();

        return redirect()->back()->with('status', 'Profil berhasil di Update');
    }
}