@extends('layouts.app')

@section('content')
    <div class="container">

        @if( \Illuminate\Support\Facades\Session::has('success'))
            <p class="alert alert-success">{{ \Illuminate\Support\Facades\Session::get('success') }}</p>
        @endif
        @if( \Illuminate\Support\Facades\Session::has('error'))
            <p class="alert alert-danger">{{ \Illuminate\Support\Facades\Session::get('error') }}</p>
        @endif

        <form action="{{ route('photo.store') }}" method='post'
              enctype="multipart/form-data">
            {{ csrf_field() }}

            @foreach($photoTypes as $photoType)
                <label class="control-label"
                       for="{{ $photoType->name }}"> {{ $photoType->name }} </label>
                <div class="form-group">
                    @if(isset($photos[$photoType->id]) && \Illuminate\Support\Facades\Storage::exists('public/photo/' . auth()->user()->id. '/'.$photos[$photoType->id]))
                        <img src="{{ str_replace('/public_html', '', url('/')) . \Illuminate\Support\Facades\Storage::url('photo/' . auth()->user()->id. '/'.
                        $photos[$photoType->id]) }}"
                             height="100px" width="100px" class="float-left">
                    @endif
                    <input type="file" class="form-control-file"
                           name="files[{{ $photoType->id }}]"
                           id="{{ $photoType->name }}">
                    {{--@isset($attribute->value)
                        @foreach($langs as $lang)
                            <input value="{{ old('attribute.'. $attribute->id , $attribute->value ?? '') }}"
                                   type="hidden" name="attribute[{{ $lang->id }}][{{ $attribute->id }}]">
                        @endforeach
                    @endisset--}}
                </div>
                <hr>
            @endforeach


            <div class="row form-group">
                <input type="submit" value="Wyślij" class="btn btn-primary">
            </div>
        </form>
    </div>
@endsection