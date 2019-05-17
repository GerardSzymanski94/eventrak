@extends('layouts.app')

@section('content')
    <div class="container">
        <h4> Lista zgłoszeń </h4>
        <ul>
            @foreach($users as $user)
                <li>
                    <a href="{{ route('admin.rating', ['user'=>$user->id]) }}">
                        {{ $user->userInfo->name }}, {{ $user->userInfo->city }}, {{ $user->userInfo->zipCode }}
                        ,{{ $user->userInfo->street }}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
@endsection