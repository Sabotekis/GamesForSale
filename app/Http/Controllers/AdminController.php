<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Videogame;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        // Retrieve all customers and companies
        if (Auth::check() && Auth::user()->type === 'admin') {
            $customers = User::where('type', 'customer')->get();
            $companies = User::where('type', 'company')->get();

            return view('admin.index', compact('customers', 'companies'));
        }
        return redirect('/')->with('error', 'Access denied');
    }

    public function block(Request $request, $id)
    {
        $user = User::findOrFail($id);

        // Toggle block status
        $user->blocked = !$user->blocked;
        $user->save();

        // Redirect back with success message
        return back()->with('success', 'User status updated successfully.');
    }

    public function destroyVideogame($id)
    {
        $videogame = Videogame::findOrFail($id);
        $videogame->delete();

        // Redirect back with success message
        return back()->with('success', 'Videogame deleted successfully.');
    }

    public function destroyComment($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->delete();

        // Redirect back with success message
        return back()->with('success', 'Comment deleted successfully.');
    }

    public function showVideogames()
    {
        $videogames = Videogame::all();
        return view('admin.show_videogames', compact('videogames'));
    }

    public function showComments()
    {
        $comments = Comment::all();
        return view('admin.show_comments', compact('comments'));
    }
}
