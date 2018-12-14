@extends('layouts.top')
@section('title', 'Scheduler')
@section('content')
    <h1>Scheduler</h1>
    <p>Type your schedule.</p>

    <form action="{{ url('/index') }}" method="post" class="mb-5">
        {{ csrf_field() }}
        <input type="input" name="shift_time" value="">
        <input type="submit" name="" value="creata">
    </form>

    @foreach ($get as $g)
      <div class="d-flex mb-3">
          <p>{{ $g->id }}  :  {{ $g->user_id }}  :  {{ $g->shift_time }}</p>
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
