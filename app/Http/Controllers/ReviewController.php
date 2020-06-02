<?php

namespace App\Http\Controllers;

use App\Review;
use App\Reviewee;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    return view('index');
  }

  public function reviews()
  {
    /*
 * Return paginated results with Reviews which have the reviewee, review and comments attached
 * The Reviewee, the # above the type is aggregated
 * The % recommended is aggregated
 * Rating score is aggregated
 * Latest (1) Comment from the Latest Review
 * */

    // Returns the Reviewee's with all their reviews and no comments.
    return response()->json(Reviewee::with([
      'reviewsPtScores',
      'latestReview.comment'])
      ->get());
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
   * @param \Illuminate\Http\Request $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    //
  }

  /**
   * Display the specified resource.
   *
   * @param \App\Review $review
   * @return \Illuminate\Http\Response
   */
  public function show(Review $review)
  {
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param \App\Review $review
   * @return \Illuminate\Http\Response
   */
  public function edit(Review $review)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param \Illuminate\Http\Request $request
   * @param \App\Review $review
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Review $review)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param \App\Review $review
   * @return \Illuminate\Http\Response
   */
  public function destroy(Review $review)
  {
    //
  }
}
