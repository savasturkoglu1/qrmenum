@extends('front.app')
@section('content')
    <div class="container is-fluid">
        @foreach($images as $img)
            <div class="img-wrp">
                <img src=" {{$img->img_url}} " class="menu-img" alt="">
            </div>
        @endforeach
    </div>
@endsection
