@extends('layout.layout')

@section('content')
    @foreach($schedules as $schedule)
        <h3 class="badge-primary center">{{ App\Group::find($schedule->group_id)->name }}</h3>
        @foreach( explode(',', $schedule->team_id) as $item)
            <h6>{{ App\Team::find($item)->team_name }}</h6>
            <hr>
        @endforeach
    @endforeach
@endsection
