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

    public function show($bookID)
    {
        $book = Book::findOrFail($bookID);
        return view('testing.book', compact('book'));
    }
}
