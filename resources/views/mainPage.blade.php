@extends('templates.basic')

@section('pageTitle')
    Home
@endsection

@section('mainBody')
    <div class="mainBodyDiv">
        <div class="leftDiv">left</div>
        <div class="midDiv">
            @include('components.successMessage')
            @foreach ($posts as $post)
                @include('components.midBodyComonent')
            @endforeach
        </div>
        <div class="rightDiv">
            <div class="myPicDIv">Pics</div>
            <div class="myMusicDiv">Music</div>
        </div>
    </div>
@endsection
