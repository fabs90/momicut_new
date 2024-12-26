<?php

namespace App\Http\Controllers;

use App\Models\CustomerReview;
use Illuminate\Http\Request;

class CustomerReviewController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'star_rating' => 'required',
            'username' => 'required',
            'comments' => 'required'
        ]);

        $user = CustomerReview::create([
            'username' => $request->username,
            'rating' => (int) $request->star_rating,
            'comments' => $request->comments,
        ]);

        if ($user) {
            return redirect()->back()->with('flash_msg_success', 'Review kamu berhasil disimpan!');
        } else {
            return redirect()->back()->withErrors(['flash_msg_error', 'Your review has been submitted Unsuccessfully,']);
        }


    }
}