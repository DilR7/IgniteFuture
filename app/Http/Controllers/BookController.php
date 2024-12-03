<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::paginate(6);
        $user = Auth::user();
        return view('user.book', compact('books','user'));
    }

    public function readBook($slug)
    {
        $user = Auth::user();
        $book = Book::where("slug", $slug)->firstOrFail();
        return view('user.readingpage', compact('book','user'));
    }
}
