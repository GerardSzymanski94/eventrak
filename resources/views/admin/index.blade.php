@extends('layouts.app')

@section('content')
    <h4> Lista zgłoszeń </h4>
    <div>
        <table class="table table-bordered table-hover col-md-12" style=" display: block; overflow-x: auto; white-space: nowrap;">
            <thead>
            <tr>
                {{-- <th scope="col">#</th>--}}
                <th class="col-1" style="width:5%">Data zgłoszenia</th>
                <th class="col-md-1" style="max-width:5%">Nazwa</th>
                <th class="col-md-1" style="width:5%">Imię i nazwisko</th>
                <th class="col-md-1">Email</th>
                <th class="col-md-1">Telefon</th>
                <th class="col-md-1">Miasto</th>
                <th class="col-md-1">Kod pocztowy</th>
                <th class="col-md-1">Ulica</th>
                <th class="col-md-1">Status</th>
                <th class="col-md-1">Suma pkt</th>
                <th class="col-md-1"></th>
            </tr>
            </thead>
            <tbody>

            @foreach($users as $user)
                <tr>
                    {{--<th scope="row">{{ $loop->iteration }}</th>--}}
                    <td class="col-md-1" style="width:5%">{{ $user->created_at }}</td>
                    <td class="col-md-1" style="max-width:5%">{{ $user->shop_name }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->phone }}</td>
                    <td>{{ $user->city }}</td>
                    <td>{{ $user->zipCode }}</td>
                    <td>{{ $user->street }}</td>
                    <td>{!! $user->getStatus() !!}</td>
                    <td>{{ $user->getPoints() }} pkt</td>
                    <td><a class="btn btn-primary"
                           href="{{ route('admin.rating', ['user'=>$user->id]) }}">Zobacz</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection