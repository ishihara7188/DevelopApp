@extends('layouts.top')
@section('title', 'Scheduler')
@section('content')
    <h1>Scheduler</h1>
    <p>Type your schedule.</p>

    <form action="{{ url('/index') }}" method="post" class="mb-5">
        {{ csrf_field() }}
        <p class="mb-0">date</p>
        <input type="input" name="shift_time" value="" class="mb-4">
        <p class="mb-0">task</p>
        <input type="input" name="body" value="">
        <!-- <input type="submit" name="" value="creata"> -->
        <button type="submit" class="ml-3">create</button>
    </form>


    {{ $car[0]->year }}

    <!-- $date[0] = "月"
    $date[0] = "月"
    $date[0] = "月"
    $date[0] = "月"
    $date[0] = "月"
    $date[0] = "月"
    $date[0] = "月"
    print $date[$i % 7]; -->



    <table class="table table-bordered">
      <thead>
        <tr>
          <td>{{ $car[0]->month }}月</td>
          <td>曜日</td>
          <td>タスク</td>
        </tr>
      </thead>

      @for ($i = 1; $i <= 31 ; $i++)
       <tr>
         <td>
           {{ $i }}
         </td>
         <td>
           {{ $i }}
         </td>
         <td>

         </td>
       </tr>
      @endfor
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
    </table>




    @foreach ($get as $g)
      <div class="d-flex mb-3">
          <p>{{ $g->id }}  :  {{ $g->user_id }}  :  {{ $g->shift_time }}  :  {{ $g->body }}</p>
          <!-- <a href="{{ url('/schedule/edit') }}">edit</a> -->
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
