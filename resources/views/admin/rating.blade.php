@extends('layouts.app')

@section('content')
    <div class="container">

        @if( \Illuminate\Support\Facades\Session::has('success'))
            <p class="alert alert-success">{{ \Illuminate\Support\Facades\Session::get('success') }}</p>
        @endif
        @if( \Illuminate\Support\Facades\Session::has('error'))
            <p class="alert alert-danger">{{ \Illuminate\Support\Facades\Session::get('error') }}</p>
        @endif

        <form action="{{ route('admin.store') }}" method='post'
              enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="hidden" name="user_id" value="{{ $user->id }}">
            @foreach($photoTypes as $photoType)
                <div class="form-group">
                    <h4> {{ $photoType->name }} </h4>

                    @if(isset($photos[$photoType->id]) && \Illuminate\Support\Facades\Storage::exists('public/photo/' . $user->id. '/'.$photos[$photoType->id]->name))
                        <img src="{{ str_replace('/public_html', '', url('/')) . \Illuminate\Support\Facades\Storage::url('photo/' . $user->id. '/'.
                        $photos[$photoType->id]->name) }}"
                             height="100px" width="100px" class="float-left">
                    @else
                        Brak zdjęcia
                    @endif
                    <select class="custom-select form-control" id="rating_{{ $photoType->id }}"
                            name="rating[{{ $photoType->id }}]">
                        @for($i=1; $i<=10; $i++)
                            <option value="{{ $i }}"
                                    @if(isset($photos[$photoType->id]->rating) && $photos[$photoType->id]->rating == $i) selected @endif>{{ $i }}</option>
                        @endfor
                    </select>
                </div>
                <hr>
            @endforeach


            <div class="row form-group">
                <input type="submit" value="Wyślij" class="btn btn-primary">

                <a style="margin-left: 25px" class="btn btn-danger" href="{{ route('admin.index') }}">Anuluj</a>
            </div>
        </form>
    </div>
@endsection