@extends('layouts.abcLayout')

@section('content')
<section class="MainContainer-box">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12 col-xl-8">
        <div class="MainContainer-box-image">

          <div class="MainContainer-box-image-textReady">
            <h2>Przygotuj się z nami <br> <span>na sezon!</span></h2>
          </div>

          <div class="MainContainer-box-image-textSimple">
            <p>To proste!</p>
          </div>

          <div class="MainContainer-box-image-textClear">
            <p>Zadbaj, <br> upiększ, <br> uporządkuj</p>
          </div>

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
            <img src="{{ asset('images/nalepka.png') }}" class="MainContainer-box-sign" alt="">
        </div>
      </div>

      <div class="col-12 col-xl-4">
        <div class="MainContainer-box-wrapper">
          <div class="MainContainer-box-register">
            <div class="MainContainer-box-title">
              <h1>Weź udział w konkursie!</h1>
            </div>

            <form class="MainContainer-box-form">
              <div class="MainContainer-box-form-group">
                <label for="input" class="MainContainer-box-form-label">Wpisz firmy</label>
                <input type="number" class="MainContainer-box-form-control" id="input" placeholder="Podaj ">
              </div>
              <div class="MainContainer-box-form-group">
                <label for="inputName" class="MainContainer-box-form-label">Imię i Nazwisko</label>
                <input type="text" class="MainContainer-box-form-control" id="inputName" placeholder="Podaj imię i nazwisko">
              </div>
              <div class="MainContainer-box-form-group">
                <label for="inputEmail" class="MainContainer-box-form-label">Adres E-mail</label>
                <input type="email" class="MainContainer-box-form-control" id="inputEmail" placeholder="Podaj adres e-mail">
              </div>
              <div class="MainContainer-box-form-group">
                <label for="inputPhone" class="MainContainer-box-form-label">Telefon Kontaktowy</label>
                <input type="number" class="MainContainer-box-form-control" id="inputPhone" placeholder="Podaj telefon kontaktowy">
              </div>

              <button type="submit" class="btn-primary-abc">Dalej <i class="fas fa-chevron-right"></i></button>
            </form>
          </div>

          <div class="MainContainer-box-footer">
            <h2>Extra bonus  <br> od partnera <br> programu</h2>
            <img src="{{ asset('images/grupa-zywiec.svg') }}" alt="">
            <p>konkurs obowiązuje od 3.06.2019 do 30.06.2019. regulamin dostępny u kierownika hurtowni i na www.przygotowaninasezon.pl</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
