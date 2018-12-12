<form action="{{ url('/index') }}" method="post" class="mb-5">
    {{ csrf_field() }}
    <input type="input" name="shift_time" value="">
    <input type="submit" name="" value="creata">
</form>

@foreach ($get as $g)
  <div class="d-flex mb-3">
      <p>{{ $g->id }}  :  {{ $g->user_id }}  :  {{ $g->shift_time }}</p>
      <form action="{{ url('/schedule/delete') }}" method="post">
          {{ csrf_field() }}
          <input type="hidden" name="id" value="{{ $g->id }}">
          <button type="submit" class="ml-3">delete</button>
      </form>
  </div>
@endforeach
