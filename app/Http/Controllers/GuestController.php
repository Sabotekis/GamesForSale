<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Videogame;

class GuestController extends Controller
{
    public function index()
    {
        $videogames = Videogame::all();
        return view('guest', ['videogames' => $videogames]);
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $videogames = Videogame::where('name', 'LIKE', "%{$query}%")->get();
        return view('guest', ['videogames' => $videogames, 'searchQuery' => $query]);
    }

    public function guestShow($videogameId)
    {
        // Fetch the videogame
        $videogame = Videogame::findOrFail($videogameId);

        // Check if the authenticated user has purchased this game
        $purchased = false; // You need to implement this logic

        return view('guestShow', [
            'videogame' => $videogame,
            'purchased' => $purchased,
        ]);
    }

}
