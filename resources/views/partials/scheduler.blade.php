<form action="{{ url('/index') }}" method="post">
    <input type="hidden" name="" value="">
    <input type="datetime" name="shift_time" value="">
    <input type="submit" name="" value="creata">
</form>

@foreach ($get as $g)
   <p>{{ $g->user_id }}   {{ $g->shift_time }}</p>
@endforeach
