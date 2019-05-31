@extends('layouts.app')

@section('content')
    <h4> Lista zgłoszeń </h4>

    <table class="table">
        <thead>
        <tr>
            {{-- <th scope="col">#</th>--}}
            <th scope="col">Data zgłoszenia</th>
            <th scope="col">Nazwa</th>
            <th scope="col">Imię i nazwisko</th>
            <th scope="col">Email</th>
            <th scope="col">Telefon</th>
            <th scope="col">Suma pkt</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>

        @foreach($users as $user)
            <tr>
                {{--<th scope="row">{{ $loop->iteration }}</th>--}}
                <td>{{ $user->created_at }}</td>
                <td>{{ $user->userInfo->name }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->phone }}</td>
                <td>{{ $user->getPoints() }} pkt</td>
                <td><a class="btn btn-primary"
                       href="{{ route('admin.rating', ['user'=>$user->id]) }}">Zobacz</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection