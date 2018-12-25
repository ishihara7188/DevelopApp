<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Schedule extends Model
{
  protected $fillable = [
      'user_id', 'shift_time', 'body',
    ];

  public function getUserId($user_id) {
    $sched = \App\Schedule::where('user_id', $user_id)->get();
      $ret = [];

      foreach( $sched as $schedule ){  
        $ret[ date( "Y", strtotime($schedule->shift_time)) ]
            [ date( "m", strtotime($schedule->shift_time)) ]
            [ date( "d", strtotime($schedule->shift_time)) ]
            []
            =$schedule;
      }

      return $ret;
  }
}
