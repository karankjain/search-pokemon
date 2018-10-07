<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pokemon;
use DB;

class PagesController extends Controller
{
    public function index() {
        return view('pages.index');
    }

    public function documentation() {
        return view('pages.documentation');
    }

    //The laodpokemon function is called using ajax in script.js file, it returns the data based on the search term
    public function loadpokemon(Request $request) {
        $search = $request->str;
        $likesearch = '%'.$search.'%';
        $pokemons = DB::table('pokemon')->distinct()
                    ->where('name', 'like', $likesearch)
                    ->orWhere('types', 'like', $likesearch)
                    ->orderBy('name', 'asc')
                    ->get(['name']);
        return json_encode($pokemons);
    }
}
