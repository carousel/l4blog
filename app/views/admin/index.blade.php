@extends("layouts.master")

@section("content")

    @foreach($users as $user)
        <ul>
            <li>{{$user["username"]}}</li>
        </ul>
    @endforeach

@endsection
