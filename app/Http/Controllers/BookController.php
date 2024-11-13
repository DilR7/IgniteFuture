<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::All();
        return view('user.book', compact('books'));
    }

    public function readBook($slug)
    {
        $book = Book::where("slug", $slug)->firstOrFail();
        return view('user.readingpage', compact('book'));
    }
}
