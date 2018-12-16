<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Schedule extends Model
{
  protected $fillable = [
      'user_id', 'shift_time', 'body',
    ];

  public function getAll() {
      return Schedule::all();
  }
}
