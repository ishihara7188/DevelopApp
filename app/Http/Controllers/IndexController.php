<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Schedule;

class IndexController extends Controller
{
    public function index(){
        $sched = new Schedule;
        $get = $sched->getAll();
        // var_dump($get);
        return view('index', ['get' => $get]);
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'shift_time' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        Post::create($request->all());
        return redirect('/index');
    }
}
