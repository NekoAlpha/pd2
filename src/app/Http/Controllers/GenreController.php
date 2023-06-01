<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genre;
use App\Models\Director;

class GenreController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //display all genres
    public function list()
    {
        $items = Genre::orderBy('name', 'asc')->get();

        return view(
            'genre.list',
            [
                'title' => 'Žanri',
                'items' => $items,
            ]
        );
    }

    //Display new genre form
    public function create()
    {
        $directors = Director::orderBy('name', 'asc')->get();
        return view(
            'genre.form',
            [
                'title' => 'Pievienot jaunu filmu',
                'genre' => new Genre(),
                'directors' => $directors,
            ]
        );
    }

        // save new genre
        public function put(Request $request)
        {
            $validatedData = $request->validate([
                'name' => 'required|min:3|max:256',
                'director_id' => 'required',
                'description' => 'nullable',
                'display' => 'nullable'
            ]);
    
            $genre = new Genre();
            $genre->name = $validatedData['name'];
            $genre->director_id = $validatedData['director_id'];
            $genre->description = $validatedData['description'];
            $genre->display = (bool) ($validatedData['display'] ?? false);
            $genre->save();
    
            return redirect('/genres');
        }

        //delete genre
        public function delete(Genre $genre)
        {
            $genre->delete();
            return redirect('/genres');
        }

    
    
}