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
              <h1>Zadbaj, upiększ, uporządkuj <br> <small>To proste!</small></h1>
            </div>

            <form class="MainContainer-box-form uploadImage">
              <div class="MainContainer-box-form-group">
                <label for="selectImage1" class="MainContainer-box-form-label">
                  <img src="{{ asset('images/ikona1.svg') }}">
                  <p>Otoczenie sklepu przed przygotowaniem do sezonu</p>
                </label>
                <input type="file" class="MainContainer-box-form-control" id="selectImage1">
              </div>
              <div class="MainContainer-box-form-group">
                <label for="selectImage2" class="MainContainer-box-form-label">
                  <img src="{{ asset('images/ikona2.svg') }}">
                  <p>Otoczenie sklepu po przygotowaniach do sezonu</p>
                </label>
                <input type="file" class="MainContainer-box-form-control" id="selectImage2">
              </div>
              <div class="MainContainer-box-form-group">
                <label for="selectImage3" class="MainContainer-box-form-label">
                  <img src="{{ asset('images/ikona3.svg') }}">
                  <p>Elewacja oraz szyby/witryny sklepu</p></label>
                <input type="file" class="MainContainer-box-form-control" id="selectImage3">
              </div>
              <div class="MainContainer-box-form-group">
                <label for="selectImage4" class="MainContainer-box-form-label">
                  <img src="{{ asset('images/ikona4.svg') }}">
                  <p>Drożna i uporządkowana strefa wejścia z ekspozycją owoców i warzyw</p>
                </label>
                <input type="file" class="MainContainer-box-form-control" id="selectImage4">
              </div>
              <div class="MainContainer-box-form-group">
                <label for="selectImage5" class="MainContainer-box-form-label">
                  <img src="{{ asset('images/ikona5.svg') }}">
                  <p>Półka/ekspozycja/witryna sprzedażowa z produktami Partnera Konkursu</p>
                </label>
                <input type="file" class="MainContainer-box-form-control" id="selectImage5">
              </div>

              <div class="form-check">
                <input type="checkbox" class="form-check-input" id="checkRule">
                <label class="form-check-label" for="checkRule">Zapoznałem się i akceptuję treść Regulaminu Promocji. Oświadczam, iż zapoznałam/em się z Regulaminem Programu organizowanego przez EVENTRAK SP. Z o.o. oraz akceptuę jego postanowienia.
                </label>
              </div>
              <div class="form-check">
                <input type="checkbox" class="form-check-input" id="checkAccept">
                <label class="form-check-label" for="checkAccept">Potwierdzam wykonanie przez Organizatora tj. EVENTRAK sp. z o.o. obowiązku informacyjnego dotyczącego przetwarzania danych osobowych uczestnika Promocji w ramach Regulaminu Promocji i wyrażam zgodę na przetwarzanie moich danych osobowych celem udziału w Promocji.</label>
              </div>

              <button type="submit" class="btn-primary-abc">Dalej <i class="fas fa-chevron-right"></i></button>
            </form>
          </div>

        </div>
      </div>
    </div>
  </div>
</section>
@endsection
