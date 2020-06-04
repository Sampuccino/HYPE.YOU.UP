<?php

namespace App\Http\Controllers;

use App\Review;
use App\Reviewee;
use Illuminate\Http\Request;

class RevieweeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Reviewee::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Reviewee  $reviewee
     * @return \Illuminate\Http\Response
     */
    public function show(Reviewee $reviewee)
    {
      return view('review-detailed', ['reviewee' => $reviewee]);
    }

  public function getReviewsWithComments(Reviewee $reviewee) {
    $reviewsWithComments = Review::where('reviewee_id', $reviewee->id)->with('comments')->get();
    return response()->json($reviewsWithComments, 200);
  }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Reviewee  $reviewee
     * @return \Illuminate\Http\Response
     */
    public function edit(Reviewee $reviewee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Reviewee  $reviewee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reviewee $reviewee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Reviewee  $reviewee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reviewee $reviewee)
    {
        //
    }
}
