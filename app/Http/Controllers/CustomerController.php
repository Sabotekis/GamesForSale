<?php

namespace App\Http\Controllers;

use App\Models\Videogame;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Models\Purchase;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public function index()
    {
        $videogames = Videogame::all();
        return view('customer.index', compact('videogames'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $videogames = Videogame::where('name', 'LIKE', "%{$query}%")->get();
        return view('customer.index', compact('videogames'));
    }

    public function buy($id)
    {
        Purchase::create([
            'user_id' => Auth::id(),
            'videogame_id' => $id,
        ]);

        return redirect()->route('customer.show', $id)->with('success', 'Videogame bought successfully.');
    }

    public function show($id)
    {
        $videogame = Videogame::findOrFail($id);
        $purchased = Purchase::where('user_id', Auth::id())->where('videogame_id', $id)->exists();

        return view('customer.show', compact('videogame', 'purchased'));
    }

    public function profile()
    {
        $purchases = Purchase::where('user_id', Auth::id())->with('videogame')->get();
        return view('customer.profile', compact('purchases'));
    }

    public function createComment($videogameId)
    {
        $purchased = Purchase::where('user_id', Auth::id())->where('videogame_id', $videogameId)->exists();
        if (!$purchased) {
            return redirect()->route('customer.show', $videogameId)->with('error', 'You need to buy the game before commenting.');
        }

        return view('customer.create', compact('videogameId'));
    }

    public function storeComment(Request $request, $videogameId)
    {
        $user = Auth::user();

        // Validate input
        $request->validate([
            'comment' => 'required|string',
        ]);

        // Create new comment
        $comment = new Comment();
        $comment->user_id = $user->id;
        $comment->videogame_id = $videogameId;
        $comment->comment = $request->input('comment');
        $comment->save();

        // Redirect back or to the videogame page
        return redirect()->route('customer.show', $videogameId)->with('success', 'Comment posted successfully!');
    }


    public function editComment($id)
    {
        $comment = Comment::findOrFail($id);
        return view('customer.edit', compact('comment'));
    }

    public function updateComment(Request $request, $id)
    {
        $request->validate([
            'comment' => 'required'
        ]);

        $comment = Comment::findOrFail($id);
        $comment->update($request->all());

        return redirect()->route('customer.show', $comment->videogame_id);
    }

    public function destroyComment($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->delete();

        return redirect()->route('customer.show', $comment->videogame_id);
    }
}


