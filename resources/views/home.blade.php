@extends('layouts.app')

<link rel="stylesheet" href="{{ asset('css/homePage.css') }}">

@section('content')
@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif
<section class="container section-tours">
    <div class=" text-center  u-margin-bottom-medium">
        <br>  <br>  <h2 class="heading-secondary my-red-text">
            My last comments
        </h2>
        <br>  <br>
    </div>
    <div class="ml-2 row">
        @foreach ($new_comments as $comment)
            <div class="col-1-of-3 mb-4 mr-5">
                <div class="card">
                    <div class="card__side card__side--front">
                        <div class="card__picture"
                             style="background-image: linear-gradient(to right bottom, rgba(177, 4, 4, 0.85), rgb(255, 91, 12)), url({{ $comment->poster }});  ">
                        </div>
                        <h4 class="my-red-text">
                            <span class="card__heading-span card__heading-span--1">{{ $comment->movie_title }}</span>
                        </h4>
                    </div>
                    <div class="card__side card__side--back card__side--back-1">
                        <div class="card__cta">
                            <div class="card__price-box">
                                <p class="my-white-text">{{ $comment->comment }}</p>
                                <p class="text-right"><small>{{ $comment->created_at->diffForHumans() }}</small></p>
                            </div>
                            <hr class="mt-5 mb-5" />
                            <div class="row mt-5">
                                <a href="{{ action('MovieController@index', $comment->movie_id) }}" class="text-right mt-5 my-red-text text-decoration-none">View</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>

<hr class="mt-5 mb-5">

<section class="container section-tours">
    <div class=" text-center  u-margin-bottom-medium">
        <br>  <br>  <h2 class="heading-secondary my-red-text">
            My last ratings
        </h2>
        <br>  <br>
    </div>
    <div class="ml-2 row">
        @foreach ($new_ratings as $rating)
            <div class="col-1-of-3 mb-4 mr-5">
                <div class="card">
                    <div class="card__side card__side--front">
                        <div class="card__picture"
                             style="background-image: linear-gradient(to right bottom, rgba(177, 4, 4, 0.85), rgb(255, 91, 12)), url({{ $rating->poster }});">
                        </div>
                        <h4 class="my-red-text">
                            <span class="card__heading-span card__heading-span--1">{{ $rating->movie_title }}</span>
                        </h4>
                    </div>
                    <div class="card__side card__side--back card__side--back-1">
                        <div class="card__cta">
                            <div class="card__price-box">
                                <p class="my-white-text">{{ $rating->rating }}/10</p>
                                <p class="text-right"><small>{{ $rating->created_at->diffForHumans() }}</small></p>
                            </div>
                            <hr class="mt-5 mb-5" />
                            <div class="row mt-5">
                                <a href="{{ action('MovieController@index', $rating->movie_id) }}" class="text-right mt-5 my-red-text text-decoration-none">View</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>
@endsection
