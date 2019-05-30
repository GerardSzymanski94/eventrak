@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Wybierz sklep</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register_post') }}">
                            @csrf

                            <input type="hidden" name="nip" value="{{ $nip }}">
                            <input type="hidden" name="name" value="{{ $name }}">
                            <input type="hidden" name="email" value="{{ $email }}">
                            <input type="hidden" name="phone" value="{{ $phone }}">

                            <ul>
                                @foreach($addresses as $address)
                                    <li><label for="{{ $address->id }}">
                                            <input id="{{ $address->id }}" type="radio" name="address_id"
                                                   value="{{ $address->id }}">{{ $address->miejscowosc }}</label></li>
                                @endforeach
                            </ul>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
