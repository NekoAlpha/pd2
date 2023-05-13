<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Director;

class DirectorController extends Controller
{
    //Display all directors
    public function list()
    {
        $items = Director::orderBy('name', 'asc')->get();

        return view(
            'director.list',
            [
                'title' => 'Režisori',
                'items' => $items
            ]
        );
    }
}
