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
    return view('new-review');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param \Illuminate\Http\Request $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    // Check if the review name exists
    $exists = Reviewee::where('name', '=', $request->reviewee['name'])->first();
    $reviewee = null;

    if ($exists === null) {
      // Create 2 records
      /*
       * Reviewee
       * then
       * Review
       * */

      $reviewee = Reviewee::create([
        'name' => $request->reviewee['name'],
        'image' => $request->reviewee['image'],
        'rating' => $request->reviewee['rating'],
        'description' => $request->reviewee['description']
      ]);
    } else $reviewee = $exists;

    $review = Review::create([
      'reviewee_id' => $reviewee->id,
      'pt_score' => $request->review['pt_score'],
      'personality' => $request->review['personality'],
      'q1' => $request->review['q1'],
      'q2' => $request->review['q2'],
      'q3' => $request->review['q3'],
      'q4' => $request->review['q4'],
      'q5' => $request->review['q5'],
      'q6' => $request->review['q6'],
      'q7' => $request->review['q7'],
      'q8' => $request->review['q8'],
      'q9' => $request->review['q9'],
      'q10' => $request->review['q10'],
      'pros' => $request->review['pros'],
      'cons' => $request->review['cons'],
      'snapchat_url' => $request->review['snapchat_url'],
      'facebook_url' => $request->review['facebook_url'],
      'instagram_url' => $request->review['instagram_url'],
      'recommend' => $request->review['recommend'],
    ]);

    $reviewee->save();
    $review->save();

    return response()->json(['reviewee' => $reviewee, 'review' => $review]);

    // Name exists
//    return response()->json(['message' => 'Record taken',  ], 400);
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
