@extends('layouts.app')

@section('content')
    <div class="x_panel">
        <div class="x_title">
            <h2>
            </h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <table class="table">
                <thead>
                <tr>
                    <th>Data</th>
                    <th>Liczba wejść</th>
                    <th>Liczba zgłoszeń</th>
                </tr>
                </thead>
                <tbody>
                @foreach($days as $key=>$value)
                    <tr>
                        <td>
                            {{ $key }}
                        </td>
                        <td>
                            {{ $value }}
                        </td>
                        <td>
                            @if(array_key_exists($key, $applications))
                                {{ $applications[$key] }}
                            @else
                                0
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

    </div>
@endsection