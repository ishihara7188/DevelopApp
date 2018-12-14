<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Schedule;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function index(){

        $sched = new Schedule;
        $get = $sched->getAll();
        // var_dump($get);
        return view('index', ['get' => $get]);
    }

    public function store(Request $request){

// Log::debug("destroy----2");
        $validator = Validator::make($request->all(), [
            'shift_time' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $date = new Schedule;
        $date->shift_time = $request->shift_time;
        $date->user_id = Auth::id();;
        $date->save();

        return redirect('/index');
    }

    public function edit(Request $request) {
        $date = Schedule::find($request->id);;
        return view ('/edit', ['date' => $date]);
    }

    public function update(Request $request) {
        $date = Schedule::find($request->id);
        $date->shift_time = $request->shift_time;
        $date->user_id = Auth::id();;
        $date->save();
        return redirect('/index');
    }

    public function destroy(Request $request) {
// Log::debug("destroy----");
        Schedule::destroy($request->id);
        return redirect('/index');
    }
}
