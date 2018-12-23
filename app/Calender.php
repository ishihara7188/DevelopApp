<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Calender extends Model
{
//   public function getCalendarDates($year, $month)
//   {
//       $dateStr = sprintf('%04d-%02d-01', $year, $month);
//       $date = new Carbon($dateStr);
//       // カレンダーを四角形にするため、前月となる左上の隙間用のデータを入れるためずらす
//       $date->subDay($date->dayOfWeek);
//       // 同上。右下の隙間のための計算。
//       $count = 40 + $date->dayOfWeek;
//       $count = ceil($count / 7) * 7;
//       $dates = [];

//       for ($i = 0; $i < $count; $i++, $date->addDay()) {
//           // copyしないと全部同じオブジェクトを入れてしまうことになる
//           $dates[] = $date->copy();
//       }
//       return $dates;
//   }

    public function getCalendarDates($year, $month)
    {
        $dateStr = sprintf('%04d-%02d-01', $year, $month);
        $date = new Carbon($dateStr);
        $count = $date->daysInMonth;
        $last = $date->copy();

        // ↓↓↓ 四角いカレンダーを出力する際に必要 ↓↓↓
        // //来月分を足す
        // $count += (Carbon::SATURDAY - $last->day($last->daysInMonth)->dayOfWeek);
        // //先月分を足す
        // $count += $date->dayOfWeek;
        // $date->subDay($date->dayOfWeek);

        $dates = [];

        for ($i = 0; $i < $count; $i++, $date->addDay()) {
            $dates[] = $date->copy();
        }
        return $dates;
    }
}
