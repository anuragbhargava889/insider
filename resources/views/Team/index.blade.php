@extends('layout.layout')

@section('content')
    <H3>Team</H3>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Team Name</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($teams as $team)
            <tr>
                <td>{{ $team->id }}</td>
                <td>{{ $team->team_name }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
