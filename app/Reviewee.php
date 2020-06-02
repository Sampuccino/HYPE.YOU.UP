<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reviewee extends Model
{

  /****/
  public function reviewsPtScores() {
    // Returns reviews with comments only with id, review id and recommend
     return $this->hasMany(Review::class)->select(['id','reviewee_id','pt_score', 'recommend', 'personality']);
  }

  public function allReviewsWithComments() {
    return $this->hasMany(Review::class, 'reviewee_id');
  }

  public function latestReview(){
    return $this->hasOne(Review::class)->select('id','reviewee_id')->latest('id');
  }

}
