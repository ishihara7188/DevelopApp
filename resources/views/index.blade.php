@extends('layouts.top')
@section('title', 'Scheduler')
@section('content')
    <h1 class="mt-0">Scheduler</h1>
    <p>Type your schedule.</p>

    <!-- ↓↓↓ 投稿フォーム ↓↓↓ -->
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
        <button type="submit" class="btn btn-primary">create</button>
    </form>

    <!-- ↓↓↓ 一行カレンダー ↓↓↓ -->
    <div class="h3">{{ $datey }}</div>
    <table class="table table-bordered">
      <thead>
        <tr>
          <!-- {{ $car[0]->month }} -->
          <td>{{ $datem }}</td>
          <td>曜日</td>
          <td>タスク</td>
        </tr>
      </thead>

      <tbody>
        @php
          $week = ["日","月","火","水","木","金","土"];
          $d = 1;
        @endphp
        @foreach ($car as $date)
        <tr>
          <td class="col-md-0.5 text-center">
            {{ $date->day }}
          </td>
          <td class="col-md-0.5 text-center">
            {{ $week[$date->dayOfWeek] }}
          </td>
          <td class="col-md-11">
          <!-- sprintfでゼロ埋めを行い、1~9日にも表記されるように修正 -->
            @if(isset($task[$datey][$datem][sprintf('%02d', $date->day)]))
              <div class="d-flex">
                @foreach($task[$datey][$datem][sprintf('%02d', $date->day)] as $t)
                  <div class="d-flex">
                    <p class="mr-2 my-auto">{{ $t["body"] }}</p>
                    <form action="{{ url('/schedule/edit') }}" method="get" class="mr-5">
                      {{ csrf_field() }}
                      <input type="hidden" name="id" value="{{ $t->id }}">
                      <input type="hidden" name="shift_time" value="{{ $t->shift_time }}">
                      <input type="hidden" name="body" value="{{ $t->body }}">
                      <button type="submit" class="">edit</button>
                      <!-- <a href="/scheldule/edit">{{ $t["body"] }}</a> -->
                    </form>
                  </div>
                @endforeach
              </div>
            @endif
          </td>
        </tr>
        @php $d ++; @endphp
        @endforeach
      </tbody>
    </table>

    <!-- ↓↓↓ 四角いカレンダーはこれ ↓↓↓ -->
    <!-- <table class="table table-bordered">
      <thead>
        <tr>
          @foreach (['日', '月', '火', '水', '木', '金', '土'] as $dayOfWeek)
          <th>{{ $dayOfWeek }}</th>
          @endforeach
        </tr>
      </thead>
      <tbody>
        @foreach ($car as $date)
            @if ($date->dayOfWeek == 0)
            <tr>
            @endif
              <td
                @if ($date->month != 12)
                class="bg-secondary"
                @endif>
                {{ $date->day }}
              </td>
            @if ($date->dayOfWeek == 6)
            </tr>
            @endif
        @endforeach
      </tbody>
    </table> -->

@endsection
