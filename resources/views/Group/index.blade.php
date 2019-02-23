@extends('layout.layout')

@section('content')
    <H3>Group</H3>
    @if(!empty($errors->first()))
        <div class="row col-lg-12">
            <div class="alert alert-danger">
                <span>{{ $errors->first() }}</span>
            </div>
        </div>
    @endif
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Group Name</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($groups as $group)
            <tr>
                <td>{{ $group->id }}</td>
                <td>{{ $group->name }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <br/>
    <form method="POST" action="/draw">
        @csrf
        <button type="submit" class="btn btn-primary">Draw</button>
    </form>
@endsection
