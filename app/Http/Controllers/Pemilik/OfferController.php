<?php

namespace App\Http\Controllers\Pemilik;

use App\User;
use App\Models\Job;
use App\Models\Owner;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Offer;
use App\models\Users;
use App\Models\worker;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class OfferController extends Controller
{
    public function index(Request $request)
    {
        $user_id = Auth::user()->id;
        $offer = Offer::where('owner_id', '=', $user_id)->get();
        $user = User::findOrFail($user_id);
        // $users = Users::where('job_id', '<=', $user)->get();
        // $worker = $users->count();
        return view('pemilik.tawaran.index')->with('offer', $offer);
    }
    public function cancel(Request $request, $id)
    {
        $offer = Offer::find($id);
        $offer->delete();
        return redirect()->back()->with('status', 'Tawaran Telah dibatalkan');
    }
}
