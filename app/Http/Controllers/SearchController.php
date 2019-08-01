<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request, $title = null, $page = 1) {
        $api = new ApiController();
        $title = $request->get('title') ? $request->get('title') : $title;
        $results = $api->search("$title");

        if (!empty($results['totalResults']) && $results['totalResults'] > 10) {
            $results = $api->search("$title", $page);
            $total_page = is_float(($results['totalResults'] / 10)) ? (intval($results['totalResults'] / 10)+1) : ($results['totalResults'] / 10);
            $paginate = [
                "curent_page" => $page,
                "title" => $title,
                "total_pages" => $total_page
            ];
            return view('movies.movies', ["results" => $results, "paginate" => $paginate]);
        }
        return view('movies.movies', compact('results', "title"));
    }

}
