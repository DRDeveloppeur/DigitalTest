@extends('layouts.app')

@section('content')
    <div class="row justify-content-center m-0 p-0">
        @if ($results['Response'])

            @foreach ($results['Search'] as $movie)
                <div class="card card-h bg-dark text-white col-2 p-0 m-1" type="button">
                    <a href="{{ action('MovieController@index', ["id" => $movie['imdbID']]) }}">
                        <img src="{{ $movie['Poster'] ? $movie['Poster'] : asset('../images/not_found.jpg') }}" class="card-img" alt="Cover">
                        <div class="card-img-overlay my-white-text">
                            <h4 class="card-title font-weight-bold">{{ $movie['Title'] }}</h4>
                            <p class="card-text">{{ $movie['Year'] }} | {{ $movie['Type'] }}</p>
                        </div>
                    </a>
                </div>
            @endforeach

            {{-- Pagination --}}
            @if (!empty($paginate))
                <div class="col-12"></div>{{-- Fix Bug --}}
                <div class="mt-4">
                    <ul class="pagination pagination-md">
                        <li class="mr-2 page-item {{ ($paginate['curent_page'] == 1) ? "disabled" : "" }}">
                            <a class="page-link" href="{{ action('SearchController@index', ["name" => $paginate['title'], "page" => 1]) }}">&laquo;</a>
                        </li>
                        @if (!empty($paginate['curent_page']) && $paginate['curent_page'] > 1)
                            <li class="page-item">
                                <a class="page-link" href="{{ action('SearchController@index', ["name" => $paginate['title'], "page" => ($paginate['curent_page']-1)]) }}">
                                    {{ $paginate['curent_page'] - 1}}
                                </a>
                            </li>
                        @endif
                        <li class="page-item active">
                            <a class="page-link">{{ $paginate['curent_page']}}</a>
                        </li>
                        @if (!empty($paginate['curent_page']) && $paginate['curent_page'] < $paginate['total_pages'])
                            <li class="page-item">
                                <a class="page-link" href="{{ action('SearchController@index', ["name" => $paginate['title'], "page" => ($paginate['curent_page']+1)]) }}">
                                    {{ $paginate['curent_page'] + 1}}
                                </a>
                            </li>
                        @endif
                        <li class="ml-2 page-item  {{ ($paginate['curent_page'] == $paginate['total_pages']) ? "disabled" : "" }}">
                            <a class="page-link" href="{{ action('SearchController@index', ["name" => $paginate['title'], "page" => $paginate['total_pages']]) }}">&raquo;</a>
                        </li>
                    </ul>
                </div>
                @endif
            {{-- End Pagination --}}

        @else
            <h6 class="mb-0 mt-5" style="color: #919aa1!important;">Aucun  resultat trouver pour "{{ $title }}"</h6>
        @endif
    </div>
@stop
