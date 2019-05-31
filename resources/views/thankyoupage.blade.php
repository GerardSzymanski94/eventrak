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
              <h2>Przygotuj się z nami<br> Na sezon!</h2>
              <h3>Zadbaj, upiększ, uporządkuj <br>  To proste!</h3>
            </div>
          </div>

          <div class="MainContainer-box-complete">
              <img src="{{ asset('images/check.svg') }}" alt="">
              <p>Twoje zgłoszenie zostało przyjęte</p>
            </div>

          <div class="MainContainer-box-footer thankyou">
            <h3>Zagraj o Extra bonus od</h3>
            <img src="{{ asset('images/grupa-zywiec.svg') }}" alt="">
            <p>Pobierz swój cel od kierownika hurtowni</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
