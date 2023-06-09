<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\Director;

class MovieController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //display all movies
    public function list()
    {
        $items = Movie::orderBy('name', 'asc')->get();

        return view(
            'movie.list',
            [
                'title' => 'Filmas',
                'items' => $items,
            ]
        );
    }

    //Display new movie form
    public function create()
    {
        $directors = Director::orderBy('name', 'asc')->get();
        return view(
            'movie.form',
            [
                'title' => 'Pievienot jaunu filmu',
                'movie' => new Movie(),
                'directors' => $directors,
            ]
        );
    }

        // save new movie
        public function put(Request $request)
        {
            $validatedData = $request->validate([
                'name' => 'required|min:3|max:256',
                'director_id' => 'required',
                'description' => 'nullable',
                'price' => 'nullable|numeric',
                'year' => 'numeric',
                'image' => 'nullable|image',
                'display' => 'nullable'
            ]);
    
            $movie = new Movie();
            $movie->name = $validatedData['name'];
            $movie->director_id = $validatedData['director_id'];
            $movie->description = $validatedData['description'];
            $movie->price = $validatedData['price'];
            $movie->year = $validatedData['year'];
            $movie->display = (bool) ($validatedData['display'] ?? false);
            $movie->save();
    
            return redirect('/movies');
        }

        //delete movie
        public function delete(Movie $movie)
        {
            $movie->delete();
            return redirect('/movies');
        }
    
    
}