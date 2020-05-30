<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
  function comments(){
    return $this->hasMany(Comment::class)
      ->latest('id')
      ->select('id', 'review_id', 'name', 'image', 'body', 'rating');
  }

  function comment(){
    return $this->hasOne(Comment::class)
      ->latest('id')
      ->select('id', 'review_id', 'name', 'image', 'body', 'rating');
  }

}
