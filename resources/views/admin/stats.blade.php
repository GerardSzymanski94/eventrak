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
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

    </div>
@endsection