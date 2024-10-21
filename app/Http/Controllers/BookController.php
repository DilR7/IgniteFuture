<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index($moduleID)
    {
        $books = Book::where('moduleID', $moduleID)->get();
        return view('testing.books', compact('books', 'moduleID'));
    }

    public function show($bookID)
    {
        $book = Book::findOrFail($bookID);
        return view('testing.book', compact('book'));
    }
}
