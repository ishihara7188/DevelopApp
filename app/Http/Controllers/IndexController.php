<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Schedule;

class IndexController extends Controller
{
    public function index(){
      $sched = new Schedule;
      $get = $sched->getAll();
      // var_dump($get);
      return view('index', ['get' => $get]);
    }
}
