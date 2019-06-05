@extends('layouts.app')

@section('content')
    <h4> Ranking </h4>
    <h5> Widoczne są tylko ocenione zgłoszenia </h5>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nazwa</th>
            <th scope="col">Imię i nazwisko</th>
            <th scope="col">Email</th>
            <th scope="col">Telefon</th>
            <th scope="col">Suma pkt</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>

        @foreach($ranking as $key=>$pkt)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $users->where('id', $key)->first()->userInfo->name }}</td>
                <td>{{ $users->where('id', $key)->first()->name }}</td>
                <td>{{ $users->where('id', $key)->first()->email }}</td>
                <td>{{ $users->where('id', $key)->first()->phone }}</td>
                <td>{{ $pkt }} pkt</td>
                <td><a class="btn btn-primary" href="{{ route('admin.rating', ['user'=>$key]) }}">Zobacz</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection