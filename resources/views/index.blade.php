@extends('layouts.top')
@section('title', 'Scheduler')
@section('content')
    <h1>Scheduler</h1>
    <p>Type your schedule.</p>

    <form action="{{ url('/index') }}" method="post" class="mb-5">
        {{ csrf_field() }}
        @if($errors->any())
            <div class="alert alert-danger">
            @foreach($errors->all() as $message)
                <p>{{ $message }}</p>
            @endforeach
            </div>
        @endif
        <div class="d-flex flex-row bd-highlight mb-3">
            <div>
                <p class="mb-0">date</p>
                <input type="input" name="shift_time" id="shift_time" value="{{ old('shift_time') }}" class="mr-4">
            </div>
            <div>
                <p class="mb-0">task</p>
                <input type="input" name="body" value="{{ old('body') }}">
            </div>
        </div>
        <button type="submit" class="ml-3">create</button>
    </form>


    {{ $car[0]->year }}

    <table class="table table-bordered">
      <thead>
        <tr>
          <!-- {{ $car[0]->month }} -->
          <td>12月</td>
          <td>曜日</td>
          <td>タスク</td>
        </tr>
      </thead>

      <tbody>
        @php
          $week = ["月","火","水","木","金","土","日"];
          $d = 1;
        @endphp
        @for ($i=0 + 5; $i < 31+5; $i++)
        <tr>
          <td class="col-md-0.5 text-center">
            {{$d}}
          </td>
          <td class="col-md-0.5 text-center">
            {{$week[$i % 7]}}
          </td>
          <td class="col-md-11">
            <!--
              taskを表示 
              きっとifでタスクがあるかを調べて出力するのかな？
              
              @if("ここが分からない")
                @foreach($get as $g)
                  {{ $g->body }}
                @endforeach
              @endif
              
              とか？？？
            -->
          </td>
        </tr>
        @php $d ++; @endphp
        @endfor
      </tbody>
    </table>


    <table class="table table-bordered">
      <thead>
        <tr>
          @foreach (['日', '月', '火', '水', '木', '金', '土'] as $dayOfWeek)
          <th>{{ $dayOfWeek }}</th>
          @endforeach
        </tr>
      </thead>
      <tbody>
        @foreach ($car as $date)
            @if ($date->dayOfWeek == 0) <!-- このあたりのifの意味がよく分からない -->
            <tr>
            @endif
              <!-- 12月のカレンダーを指定している？ -->
              <td
                @if ($date->month != 12)
                class="bg-secondary"
                @endif>
                {{ $date->day }}
              </td>
            @if ($date->dayOfWeek == 6) <!-- このあたりのifの意味がよく分からない -->
            </tr>
            @endif
        @endforeach
      </tbody>
    </table>




    @foreach ($get as $g)
      <div class="d-flex mb-3">
          <p>{{ $g->id }}  :  {{ $g->user_id }}  :  {{ $g->shift_time }}  :  {{ $g->body }}</p>
          <form action="{{ url('/schedule/edit') }}" method="get">
              {{ csrf_field() }}
              <input type="hidden" name="id" value="{{ $g->id }}">
              <button type="submit" class="ml-3">edit</button>
          </form>
          <form action="{{ url('/schedule/delete') }}" method="post">
              {{ csrf_field() }}
              <input type="hidden" name="id" value="{{ $g->id }}">
              <button type="submit" class="ml-3">delete</button>
          </form>
      </div>
    @endforeach

@endsection
