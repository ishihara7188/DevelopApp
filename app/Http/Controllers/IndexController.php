<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Schedule;
use App\Calender;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CreateDate;


class IndexController extends Controller
{
    public function index()
    {
        $sched = new Schedule;
        $get = $sched->getAll(Auth::id());

        $datey = date("Y");
        $datem = date("m");

        $carbon = new Calender;
        $car = $carbon->getCalendarDates($datey,$datem);

        $task = $get;
        
        return view('/index', ['get' => $get, 'datey' => $datey, 'datem' => $datem, 'car' => $car, 'task' => $task]);
    }

    public function store(CreateDate $request)
    {
        $date = new Schedule;
        $date->shift_time = $request->shift_time;
        $date->body = $request->body;
        $date->user_id = Auth::id();
        $date->save();

        return redirect('/index');
    }

    public function edit($id)
    {
        $date = Schedule::find($id);
        return view ('/edit', ['date' => $date]);
    }

    public function update(CreateDate $request)
    {
        // \App\Schedule::where('id', $request->id)->delete();


        $date = Schedule::find($request->id);
        $date->shift_time = $request->shift_time;
        $date->body = $request->body;
        $date->user_id = Auth::id();
        $date->save();
        return redirect('/index');
    }

    public function destroy(Request $request)
    {
        \App\Schedule::where('id', $request->id)->delete();
        // Schedule::destroy($request->id);
        return redirect('/index');
    }
}
