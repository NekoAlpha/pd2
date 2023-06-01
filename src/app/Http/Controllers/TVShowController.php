<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tv_Show;
use App\Models\Director;

class TVShowController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //display all tv_shows
    public function list()
    {
        $items = Tv_Show::orderBy('name', 'asc')->get();

        return view(
            'tv_show.list',
            [
                'title' => 'TV Šovi',
                'items' => $items,
            ]
        );
    }

    //Display new tv_show form
    public function create()
    {
        $directors = Director::orderBy('name', 'asc')->get();
        return view(
            'tv_show.form',
            [
                'title' => 'Pievienot jaunu šovu',
                'tv_show' => new Tv_Show(),
                'directors' => $directors,
            ]
        );
    }

        // save new tv_show
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
    
            $tv_show = new Tv_Show();
            $tv_show->name = $validatedData['name'];
            $tv_show->director_id = $validatedData['director_id'];
            $tv_show->description = $validatedData['description'];
            $tv_show->price = $validatedData['price'];
            $tv_show->year = $validatedData['year'];
            $tv_show->display = (bool) ($validatedData['display'] ?? false);
            $tv_show->save();
    
            return redirect('/tv_shows');
        }


        //delete tv_show
        public function delete(Tv_Show $tv_show)
        {
            $tv_show->delete();
            return redirect('/tv_shows');
        }
    
    
}