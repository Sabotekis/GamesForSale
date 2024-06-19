<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Videogame;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{
    public function index()
    {
        $user_id = Auth::id(); // Get the authenticated user's ID
        $videogames = Videogame::where('user_id', $user_id)->get();
        return view('company.index', compact('videogames'));
    }


    public function create()
    {
        return view('company.create');
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        // Validate incoming request
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
        ]);

        // Create a new videogame
        $videogame = new Videogame();
        $videogame->name = $request->name;
        $videogame->description = $request->description;
        $videogame->price = $request->price;
        $videogame->user_id = $user->id; // Assign current company ID
        $videogame->save();

        return redirect()->route('company.index')->with('success', 'Videogame created successfully.');
    }


    public function show($id)
    {
        $videogame = Videogame::findOrFail($id);
        return view('company.show', compact('videogame'));
    }

    public function edit($id)
    {
        $videogame = Videogame::findOrFail($id);
        return view('company.edit', ['videogame' => $videogame]);
    }

    public function update(Request $request, $id)
    {

        // Validate incoming request
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            // Add more validation rules as needed
        ]);

        // Update existing videogame
        $videogame = Videogame::findOrFail($id);
        $videogame->name = $request->name;
        $videogame->description = $request->description;
        $videogame->price = $request->price;
        $videogame->save();

        return redirect()->route('company.index')->with('success', 'Videogame updated successfully.');
    }

    public function destroy($id)
    {
        $videogame = Videogame::findOrFail($id);
        $videogame->delete();
        return redirect()->route('company.index')->with('success', 'Videogame deleted successfully.');
    }

    public function profileVideogames()
    {
        $user_id = Auth::id(); // Get the authenticated user's ID
        $videogames = Videogame::where('user_id', $user_id)->get();
        return view('company.profile', compact('videogames'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $videogames = Videogame::where('name', 'LIKE', "%{$query}%")->get();
        return view('company.index', compact('videogames'));
    }
}
