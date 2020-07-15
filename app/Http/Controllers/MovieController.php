<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Movie;
use App\Genre;
use App\Http\Requests\MoviePost;

class MovieController extends Controller
{
    public function index(Request $request)
    {
        $movies = Movie::all();

        return view('movie.index', ['movies' => $movies]);
    }

    public function show($id)
    {
        return view('movie.show', ['movie' => Movie::findOrFail($id)]);
    }
    
    public function create(Request $request)
    {
        $genres = Genre::all();

        return view('movie.create', ['genres' => $genres]);
    }

    public function store(MoviePost $request)
    {
        $validation = $request->validated();
        $movie = new Movie($validation);

        $movie->save();
        return redirect('/');
    }

    public function edit($id)
    {
        $genres = Genre::all();

        return view('movie.edit', ['movie' => Movie::findOrFail($id), 'genres' => $genres]);
    }

    public function update(Request $request)
    {
        $editFormParams = $request->all();
        $movie = Movie::findOrFail($editFormParams['id']);

        $movie->name = $editFormParams['name'];
        $movie->cost = $editFormParams['cost'];
        $movie->release_date = $editFormParams['release_date'];
        $movie->genre_id = $editFormParams['genre_id'];

        $movie->save();
        return redirect('/show/'.$editFormParams['id']);
    }
}
