<?php

namespace App\Http\Controllers\Pemilik;

use App\Models\Job;
use App\Models\Users;
use App\Models\worker;
use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Models\Offer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ViewpostController extends Controller
{

    public function categoryview($category_url)
    {
        $category = Category::where('url', $category_url)->first();
        $category_id = $category->id;

        // if (Request::get('sort') == 'salary_asc') {
        //     $job = Job::where('category_id', $category_id)
        //         ->orderBy('job_salary', 'asc')
        //         ->where('job_status', '!=', '2')
        //         ->where('job_status', '0')->get();
        // } elseif (Request::get('sort') == 'salary_desc') {
        //     $job = Job::where('category_id', $category_id)
        //         ->orderBy('job_salary', 'desc')
        //         ->where('job_status', '!=', '2')
        //         ->where('job_status', '0')->get();
        // } elseif (Request::get('sort') == 'newest') {
        //     $job = Job::where('category_id', $category_id)
        //         ->orderBy('created_at', 'desc')
        //         ->where('job_status', '!=', '2')
        //         ->where('job_status', '0')->get();
        // } else {
        //     $job = Job::where('category_id', $category_id)->where('job_status', '!=', '2')->where('job_status', '0')->get();
        // }

        $worker = worker::where('category_id', $category_id)->where('status', '!=', '1')->where('status', '0')->get();

        return view('pemilik.post.post')->with('worker', $worker)->with('category', $category);
    }

    public function postview($category_url, $url)
    {
        $user_id = Auth::user()->id;
        $job = Job::where('owner_id', '=', $user_id)->where('job_status', '!=', '3')->get();
        $worker = worker::where('url', $url)->where('status', '!=', '1')->where('status', '0')->first();
        return view('pemilik.post.post-view')->with('worker', $worker)->with('job', $job);
    }
    public function sendoffer(Request $request)
    {

        $offer = new Offer();
        $offer->user_id = $request->input('user_id');
        $offer->job_id = $request->input('job_id');
        $offer->owner_id = $request->input('owner_id');
        $offer->save();
        $user_id = Auth::user()->id;
        $offer2 = Offer::where('owner_id', '=', $user_id)->get();

        return view('pemilik.tawaran.index')->with('offer', $offer2)->with('status', 'Tawaran Pekerjaan Telah Dikirim');
    }
}
