@extends('layouts.app')

@section('content')
    <div class="container">
        <ul>
            @foreach($users as $user)
                <li>
                    {{ $user->name }}
                </li>
            @endforeach
        </ul>
    </div>
@endsection