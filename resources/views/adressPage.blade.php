@extends('layouts.abcLayout')

@section('content')
    <section class="MainContainer-box">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-xl-6">
                    <div class="MainContainer-box-image">

                        <img
                                sizes=" (max-width: 1209px) 100vw, 1209px"
                                srcset="
            {{ asset('images/trawa-tlo_zremtz_c_scale,w_200.jpg') }} 200w,
            {{ asset('images/trawa-tlo_zremtz_c_scale,w_403.jpg') }} 403w,
            {{ asset('images/trawa-tlo_zremtz_c_scale,w_543.jpg') }} 543w,
            {{ asset('images/trawa-tlo_zremtz_c_scale,w_664.jpg') }} 664w,
            {{ asset('images/trawa-tlo_zremtz_c_scale,w_775.jpg ') }} 775w,
            {{ asset('images/trawa-tlo_zremtz_c_scale,w_875.jpg') }} 875w,
            {{ asset('images/trawa-tlo_zremtz_c_scale,w_958.jpg') }} 958w,
            {{ asset('images/trawa-tlo_zremtz_c_scale,w_1060.jpg') }} 1060w,
            {{ asset('images/trawa-tlo_zremtz_c_scale,w_1152.jpg') }} 1152w,
            {{ asset('images/trawa-tlo_zremtz_c_scale,w_1209.jpg') }} 1209w
          "
                                src="{{ asset('images/trawa-tlo.jpg') }}"
                                class="MainContainer-box-image-background"
                                alt="">

                        <img src="{{ asset('images/red-line.png') }}" class="MainContainer-box-redLine" alt="">
                    </div>
                </div>

                <div class="col-12 col-xl-6">
                    <div class="MainContainer-box-wrapper">
                        <div class="MainContainer-box-register">
                            <div class="MainContainer-box-title">
                                <h1>Zadbaj, upiększ, uporządkuj <br>
                                    <small>To proste!</small>
                                </h1>
                            </div>

                            <form method="POST" action="{{ route('register_post') }}" class="MainContainer-box-form">
                                @csrf

                                <input type="hidden" name="nip" value="{{ $nip }}">
                                <input type="hidden" name="name" value="{{ $name }}">
                                <input type="hidden" name="email" value="{{ $email }}">
                                <input type="hidden" name="phone" value="{{ $phone }}">
                                <div class="MainContainer-box-form-group">
                                    <label for="selectListAdress" class="MainContainer-box-form-label">Wybierz adres
                                        sklepu</label>


                                    <select class="MainContainer-box-form-control" id="selectListAdress"
                                            name="address_id">
                                        @foreach($addresses as $address)
                                            <option value="{{ $address->id }}">{{ $address->miejscowosc }}
                                                , {{ $address->kod_pocztowy }}
                                                , {{ $address->ulica }}</option>
                                        @endforeach
                                    </select>

                                </div>
                                <button type="submit" class="btn-primary-abc">Dalej <i class="fas fa-chevron-right"></i>
                                </button>
                            </form>
                        </div>

                        <div class="MainContainer-box-footer">
                            <h2>Extra bonus <br> od partnera <br> programu</h2>
                            <img src="{{ asset('images/grupa-zywiec.svg') }}" alt="">
                            <p>konkurs obowiązuje od 3.06.2019 do 30.06.2019. regulamin dostępny u kierownika hurtowni i
                                na www.przygotowaninasezon.pl</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
