@extends('layouts.app')

@section('content')
    <div class="container">

        @if( \Illuminate\Support\Facades\Session::has('success'))
            <p class="alert alert-success">{{ \Illuminate\Support\Facades\Session::get('success') }}</p>
        @endif
        @if( \Illuminate\Support\Facades\Session::has('error'))
            <p class="alert alert-danger">{{ \Illuminate\Support\Facades\Session::get('error') }}</p>
        @endif

        <h3>NIP : {{ $info->nip }}</h3>

        <h4>
            Email : {{ auth()->user()->email }}
        </h4>
        <h4>
            Nr telefonu : {{ auth()->user()->phone }}
        </h4>

        <form action="{{ route('user_info.update', ['userInfo'=>$info->id]) }}" method='post'
              enctype="multipart/form-data">
            {{ csrf_field() }}

            <div class="form-group ">
                <label class="control-label" for="name"> Nazwa </label>
                <input value="{{ old('name', $info->name ?? '') }}"
                       type="text"
                       class="form-control" name="name" id="name"
                       placeholder="">
                @if($errors->has('name'))
                    <p class="alert alert-danger"> {{ $errors->first('name') }}
                    </p>
                @endif
            </div>
            <div class="form-group ">
                <label class="control-label"
                       for="province"> Województwo </label>
                <input value="{{ old('province', $info->province ?? '') }}"
                       type="text"
                       class="form-control" name="province" id="province"
                       placeholder="">
                @if($errors->has('province'))
                    <p class="alert alert-danger"> {{ $errors->first('province') }}
                    </p>
                @endif
            </div>
            <div class="form-group ">
                <label class="control-label"
                       for="city"> Miasto </label>
                <input value="{{ old('city', $info->city ?? '') }}"
                       type="text"
                       class="form-control" name="city" id="city"
                       placeholder="">
                @if($errors->has('city'))
                    <p class="alert alert-danger"> {{ $errors->first('city') }}
                    </p>
                @endif
            </div>
            <div class="form-group ">
                <label class="control-label"
                       for="district"> Rejon </label>
                <input value="{{ old('district', $info->district ?? '') }}"
                       type="text"
                       class="form-control" name="district" id="district"
                       placeholder="">
                @if($errors->has('district'))
                    <p class="alert alert-danger"> {{ $errors->first('district') }}
                    </p>
                @endif
            </div>

            <div class="form-group ">
                <label class="control-label"
                       for="community"> Dzielnica </label>
                <input value="{{ old('community', $info->community ?? '') }}"
                       type="text"
                       class="form-control" name="community" id="community"
                       placeholder="">
                @if($errors->has('community'))
                    <p class="alert alert-danger"> {{ $errors->first('community') }}
                    </p>
                @endif
            </div>
            <div class="form-group ">
                <label class="control-label"
                       for="zipCode"> Kod pocztowy </label>
                <input value="{{ old('zipCode', $info->zipCode ?? '') }}"
                       type="text"
                       class="form-control" name="zipCode" id="zipCode"
                       placeholder="">
                @if($errors->has('zipCode'))
                    <p class="alert alert-danger"> {{ $errors->first('zipCode') }}
                    </p>
                @endif
            </div>
            <div class="form-group ">
                <label class="control-label"
                       for="street"> Ulica </label>
                <input value="{{ old('street', $info->street ?? '') }}"
                       type="text"
                       class="form-control" name="street" id="street"
                       placeholder="">
                @if($errors->has('street'))
                    <p class="alert alert-danger"> {{ $errors->first('street') }}
                    </p>
                @endif
            </div>

            <div class="row form-group">
                <input type="submit" value="Potwierdź" class="btn btn-primary">
            </div>
        </form>
    </div>
@endsection