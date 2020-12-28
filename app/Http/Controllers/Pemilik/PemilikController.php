<?php

namespace App\Http\Controllers\Pemilik;

use App\User;
use App\Models\Payment;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class PemilikController extends Controller
{
    public function index()
    {
        $category = Category::where('status', '0')->get();
        return view('pemilik.dashboard')->with('category', $category);
    }

    public function myprofile()
    {
        return view('pemilik.profil');
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
    public function payment()
    {
        $user_id = Auth::user()->id;
        $payment = Payment::where('owner_id', '=', $user_id)->get();
        return view('pemilik.pembayaran.index')->with('payment', $payment);
    }
    public function viewpayment($id)
    {
        $payment = Payment::find($id);
        return view('pemilik.pembayaran.view')->with('payment', $payment);
    }
    public function payworker(Request $request, $id)
    {
        $payment = Payment::find($id);
        if ($request->hasfile('transfer_proof')) {
            $filepath_image = 'uploads/payment/' . $payment->transfer_proof;
            if (File::exists($filepath_image)) {
                File::delete($filepath_image);
            }
            $image_file = $request->file('transfer_proof');
            $img_extension = $image_file->getClientOriginalExtension();
            $p_filename = time() . '.' . $img_extension;
            $image_file->move('uploads/payment/', $p_filename);
            $payment->transfer_proof = $p_filename;
        }
        $payment->update();

        return redirect()->back()->with('status', 'Lowongan berhasil di update');
    }
}
