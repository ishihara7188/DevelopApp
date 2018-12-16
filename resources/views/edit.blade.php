@extends('layouts.top')
@section('title', 'Edit schedule')
@section('content')
    <h1>Edit schedule</h1>
    <p>Edit your schedule.</p>



      <div class="d-flex mb-3">
          <p>{{ $date->id }}  :  {{ $date->user_id }}  :</p>
          <form action="{{ url('/schedule/edit') }}" method="post">
              {{ csrf_field() }}
              <input type="hidden" name="id" value="{{ $date->id }}">
              <input type="input" name="shift_time" value="{{ $date->shift_time }}">
              <input type="input" name="body" value="{{ $date->body }}">
              <button type="submit" class="ml-3">update</button>
          </form>
      </div>

@endsection
