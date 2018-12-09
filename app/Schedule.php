<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
  protected $fillable = [
      'user_id', 'shift_time',
    ];

  public function getAll() {
      return Schedule::all();
  }
}
