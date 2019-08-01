@extends('layouts.app')

@section('content')
<div class="container">

    @if (!empty($success))
        <div class="success">
            <p class="my-white-text">{{ $success->message }}</p>
        </div>
    @endif

    <div class="row">
        @if (!empty($movie))
            <div class="col-3">
                <img src="{{ $movie['Poster'] ? $movie['Poster'] : asset('../images/not_found.jpg') }}" class="img-fluid rounded mt-5" alt="Responsive image">
            </div>

            <div class="col-6">
                <h1 class="text-center mb-5 my-red-text">{{ $movie['Title'] ? $movie['Title'] : "Title not found !" }}</h1>
                <p class="text-center mt-5">{{ $movie['Plot'] ? $movie['Plot'] : "" }}</p>
                <hr>
                <p class="text-center mb-5">{{ $movie['Awards'] ? $movie['Awards'] : "" }}</p>
                @if (!empty($movie['Actors']))
                    <p><span class="my-red-text">Actors</span> :
                        @if (is_array($movie['Actors'])) |
                            @foreach ($movie['Actors'] as $value)
                                {{ $value }} |
                            @endforeach
                        @else
                            {{ $movie['Actors'] }}
                        @endif
                    </p>
                @endif

                @if (!empty($movie['Genre']))
                    <p><span class="my-red-text">Genre</span> :
                        @if (is_array($movie['Genre'])) |
                            @foreach ($movie['Genre'] as $value)
                                {{ $value }} |
                            @endforeach
                        @else
                            {{ $movie['Genre'] }}
                        @endif
                    </p>
                @endif

                @if ($user)
                    <div class="row justify-content-center mt-5">
                        <small class="my-red-text">My rating</small>
                    </div>
                    <div class="row justify-content-center">
                        <form action="{{ route('new-rating') }}" method="post">
                            @csrf
                            <input type="hidden" name="user_id" value="{{ $user->id }}">
                            <input type="hidden" name="username" value="{{ $user->name }}">
                            <input type="hidden" name="movie_id" value="{{ $movie['imdbID'] }}">
                            <input type="hidden" name="movie_title" value="{{ $movie['Title'] }}">
                            <input type="hidden" name="poster" value="{{ $movie['Poster'] ? $movie['Poster'] : asset('../images/not_found.jpg') }}">
                            <fieldset class="form-group">
                                <div class="row">
                                    <div class="rate">
                                        <input type="radio" {{ $my_rate && $my_rate == 10 ? "checked" : "" }} id="star10" name="rate" value="10" />
                                        <label for="star10" title="10">10 stars</label>
                                        <input type="radio" {{ $my_rate && $my_rate == 9 ? "checked" : "" }} id="star9" name="rate" value="9" />
                                        <label for="star9" title="9">9 stars</label>
                                        <input type="radio" {{ $my_rate && $my_rate == 8 ? "checked" : "" }} id="star8" name="rate" value="8" />
                                        <label for="star8" title="8">8 stars</label>
                                        <input type="radio" {{ $my_rate && $my_rate == 7 ? "checked" : "" }} id="star7" name="rate" value="7" />
                                        <label for="star7" title="7">7 stars</label>
                                        <input type="radio" {{ $my_rate && $my_rate == 6 ? "checked" : "" }} id="star6" name="rate" value="6" />
                                        <label for="star6" title="6">6 star</label>
                                        <input type="radio" {{ $my_rate && $my_rate == 5 ? "checked" : "" }} id="star5" name="rate" value="5" />
                                        <label for="star5" title="5">5 stars</label>
                                        <input type="radio" {{ $my_rate && $my_rate == 4 ? "checked" : "" }} id="star4" name="rate" value="4" />
                                        <label for="star4" title="4">4 stars</label>
                                        <input type="radio" {{ $my_rate && $my_rate == 3 ? "checked" : "" }} id="star3" name="rate" value="3" />
                                        <label for="star3" title="3">3 stars</label>
                                        <input type="radio" {{ $my_rate && $my_rate == 2 ? "checked" : "" }} id="star2" name="rate" value="2" />
                                        <label for="star2" title="2">2 stars</label>
                                        <input type="radio" {{ $my_rate && $my_rate == 1 ? "checked" : "" }} id="star1" name="rate" value="1" />
                                        <label for="star1" title="1">1 star</label>
                                    </div>
                                </div>
                            </fieldset>
                            <div class="row justify-content-center">
                                <button type="submit" class="btn btn-primary btn-sm">Validate</button>
                            </div>
                        </form>
                    </div>
                @endif
            </div>

            <div class="col-3">
                <div class="list-group">
                    <div class="list-group-item list-group-item-action flex-column align-items-start active">
                        <div class="d-flex w-100 justify-content-between mb-2">
                            <h5 class="mb-1 my-white-text">More info</h5>
                        </div>
                        <hr class="mb-2">
                        @if (!empty($movie['Language']))
                            <p><span class="my-white-text">Language</span> :
                                @if (is_array($movie['Language'])) |
                                    @foreach ($movie['Language'] as $value)
                                        {{ $value }} |
                                    @endforeach
                                @else
                                    {{ $movie['Language'] }}
                                @endif
                            </p>
                        @endif

                        @if (!empty($movie['Country']))
                            <p><span class="my-white-text">Country</span> :
                                @if (is_array($movie['Country'])) |
                                    @foreach ($movie['Country'] as $value)
                                        {{ $value }} |
                                    @endforeach
                                @else
                                    {{ $movie['Country'] }}
                                @endif
                            </p>
                        @endif

                        @if (!empty($movie['Writer']))
                            <p><span class="my-white-text">Writer</span> :
                                @if (is_array($movie['Writer'])) |
                                    @foreach ($movie['Writer'] as $value)
                                        {{ $value }} |
                                    @endforeach
                                @else
                                    {{ $movie['Writer'] }}
                                @endif
                            </p>
                        @endif

                        <p><span class="my-white-text">Date</span> : {{ $movie['Released'] ? $movie['Released'] : "" }}</p>
                    </div>
                </div>

                <ul class="list-group mt-4">
                    <a href="#ratings" class="list-group-item d-flex justify-content-between align-items-center active text-decoration-none">
                        Ratings
                        <span class="badge badge-dark badge-pill">{{ $new_ratings ? $new_ratings : $movie['imdbRating'] }}/10</span>
                    </a>

                    @if (!empty($movie['Type']) && $movie['Type'] == 'series')
                        <a class="list-group-item d-flex justify-content-between align-items-center active">
                            Saisons
                            <span class="badge badge-dark badge-pill">{{ $movie['totalSeasons'] }}</span>
                        </a>
                    @endif

                    <a class="list-group-item d-flex justify-content-between align-items-center active">
                        Runtime
                        <span class="badge badge-dark badge-pill">{{ $movie['Runtime'] }}</span>
                    </a>
                </ul>
            </div>
        @endif
    </div>

    <div class="row mt-5" id="comments">
        @if (!empty($comments))
            <div class="col-3 mt-5">
                <ul class="list-group mt-5">
                    @if (!empty($movie['Type']) && $movie['Type'] == 'series')
                        @if ($user)
                            <a class="list-group-item d-flex justify-content-between align-items-center active mt-5">
                                My comments
                                <span class="badge badge-dark badge-pill">{{ $comments->where('user_id', $user->id)->count() }}</span>
                            </a>
                        @endif
                        <a class="list-group-item d-flex justify-content-between align-items-center active">
                            Total comments
                            <span class="badge badge-dark badge-pill">{{ $comments->count() }}</span>
                        </a>
                    @endif
                </ul>
            </div>

            <div class="col-6 mt-5">
                <h1 class="text-center mb-5 my-red-text">Comments</h1>
                @foreach($comments as $comment)
                    <h5 class="mb-0 card card-header {{ ($user && $user->id == $comment->user_id) ? "my-red-text" : "my-white-text" }}">
                        {{ $comment->username }}
                    </h5>
                    @if ($user && $user->id == $comment->user_id)
                        <div class="row justify-content-end mr-2 mt-2">
                            <a href="{{ route('destroy-comment', $comment) }}" onclick="return confirm('Are you sure?')" class="my-red-text text-decoration-none">X</a>
                        </div>
                    @endif
                    <p class="mb-2 ml-2 mt-2">{{ $comment->comment }}</p>
                    <hr class="mt-5 mb-0">
                    <p class="text-right mt-0 mb-5"><small>{{ $comment->created_at->diffForHumans() }}</small></p>
                @endforeach
            </div>

            <div class="col-3">
            </div>
        @endif
    </div>
    @if ($user)
        <form class="col-8 offset-2 mt-5" method="post" action="{{ route('new-comment') }}">
            @csrf
            <fieldset>
                <legend class="my-blue-text text-center">Hello {{ $user->name }}. You want to leave a comment ?</legend>
                <input type="hidden" name="user_id" value="{{ $user->id }}">
                <input type="hidden" name="movie_title" value="{{ $movie['Title'] }}">
                <input type="hidden" name="movie_id" value="{{ $movie['imdbID'] }}">
                <input type="hidden" name="username" value="{{ $user->name }}">
                <input type="hidden" name="poster" value="{{ $movie['Poster'] ? $movie['Poster'] : asset('../images/not_found.jpg') }}">
                <div class="form-group mt-5 row justify-content-center">
                    <label for="exampleTextarea" class="my-white-text mb-4">Comment</label>
                    <textarea class="form-control-plaintext my-textarea" name="comment" id="exampleTextarea" placeholder="Your comment ..." rows="3"></textarea>
                </div>
                <div class="row justify-content-end">
                    <button type="submit" class="btn btn-primary">Send</button>
                </div>
            </fieldset>
        </form>
    @endif

    @if (!empty($movie['Ratings']))
        <div class="row mt-5">
            <div class="col-8 offset-2 mt-5" id="ratings">
                <h1 class="my-red-text mb-5 mt-4">Ratings</h1>
                    @if (!empty($ratings))
                        @foreach ($ratings as $rating)
                            @if ($rating->movie_id == $movie['imdbID'])
                                <div class="row">
                                    <h6 class="mb-3 {{ ($user && $rating->user_id == $user->id) ? "my-red-text" : "my-white-text" }} mr-4">{{ $rating->username }}</h6>
                                    <span class="ml-3">{{ $rating->rating }}/10</span>
                                </div>
                            @endif
                        @endforeach
                    @endif
                    @foreach ($movie['Ratings'] as $rating)
                        <div class="row">
                            <h6 class="mb-3 my-white-text mr-4">{{ $rating['Source'] }}</h6>
                            <span class="ml-3">{{ $rating['Value'] }}</span>
                        </div>
                    @endforeach
            </div>
        </div>
    @endif
</div>

@stop
