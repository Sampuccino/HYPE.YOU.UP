<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{

  protected $fillable = [
    'reviewee_id',
    'pt_score',
    'personality',
    'q1',
    'q2',
    'q3',
    'q4',
    'q5',
    'q6',
    'q7',
    'q8',
    'q9',
    'q10',
    'pros',
    'cons',
    'snapchat_url',
    'facebook_url',
    'instagram_url',
    'recommend'];

  function comments()
  {
    return $this->hasMany(Comment::class)
      ->latest('id')
      ->select('id', 'review_id', 'name', 'image', 'body', 'rating');
  }

  function comment()
  {
    return $this->hasOne(Comment::class)
      ->latest('id')
      ->select('id', 'review_id', 'name', 'image', 'body', 'rating');
  }

}
