@extends('layouts.top')
@section('title', 'Edit schedule')
@section('content')
    <h1>Edit schedule</h1>
    <p>Edit your schedule.</p>



      <div class="d-flex mb-3">
          <form action="{{ url('/schedule/edit') }}" method="post">
              {{ csrf_field() }}
              <input type="hidden" name="id" value="{{ $date->id }}">
              <input type="input" name="shift_time" id="shift_time" value="{{ $date->shift_time }}">
              <input type="input" name="body" value="{{ $date->body }}">
              <button type="submit" class="ml-3 btn btn-success">update</button>
          </form>
          <form action="{{ url('/schedule/delete') }}" method="post">
              {{ csrf_field() }}
              <input type="hidden" name="id" value="{{ $date->id }}">
              <button type="submit" class="ml-3 btn btn-danger">delete</button>
          </form>
      </div>

@endsection
