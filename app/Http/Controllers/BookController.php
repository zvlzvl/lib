<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
Use PDF;
use Illuminate\Http\Request;



class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $authors = Author::all();
        $books = Book::all();

        if ($request->author_id) {
            $books = Book::where('author_id', $request->author_id)->get();
            $author_id = $request->author_id;
        }
        else {
            $books = Book::all();
            $author_id = 0;
        }

        if($request->sort) {
            if('asc' == $request->order) {
                if('title' == $request->sort) {
                    $books= $books->sortBy('title');
                    $order ='asc';
                    $sort = 'title';
                }
                if('pages' == $request->sort) {
                    $books= $books->sortBy('pages');
                    $order ='asc';
                    $sort = 'pages';
                }
            }
            if('desc' == $request->order) {
                if('title' == $request->sort) {
                    $books= $books->sortByDesc('title');
                    $order ='desc';
                    $sort = 'title';
                }
                if('pages' == $request->sort) {
                    $books= $books->sortByDesc('pages');
                    $order ='desc';
                    $sort = 'pages';
                }

            }
        }
        else{
            $books = $books->sortBy('title');
            $authors = $authors->sortBy('surname');

        }
        return view('book.index', [
            'books' => $books,
            'authors'=> $authors,
            'order' => $order ?? '',
            'sort' => $sort ?? '',
            'author_id' => $author_id,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $authors = Author::all();
        return view('book.create', ['authors' => $authors]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate(
        [
            'book_title' => ['required', 'min:3', 'max:64'],
            'book_pages' => ['required', 'integer', 'min:1', 'max:9999'],
            'book_isbn' => ['required', 'min:3', 'max:64'],
            'book_short_description' => ['required'],
            'author_id' => ['required', 'integer', 'min:1'],
        ],
        [
            'book_title.required' => 'Ä®raÅ¡ykite knygos pavadinimÄ…!',
            'book_title.min' => 'Per trumpas pavadinimas!',
            'book_title.max' => 'Per ilgas pavadinimas!',

            'book_pages.required' => 'Ä®raÅ¡ykite puslapiÅ³ skaiÄiÅ³!',
            'book_pages.integer' => 'Pateikite skaiÄiÅ³!',
            'book_pages.min' => 'Knygoje turi bÅ«ti bent vienas puslapis!',
            'book_pages.max' => 'Per didelis puslapiÅ³ skaiÄius!',

            'book_isbn.required' => 'Ä®raÅ¡ykite knygos ISBN kodÄ…!',
            'book_isbn.min' => 'Per trumpas ISBN kodas!',
            'book_isbn.max' => 'Per ilgas ISBN kodas!',

            'book_short_description.required' => 'Pateikite knygos apraÅ¡ymÄ…!',

            'author_id.min' => 'Pasirinkite autoriÅ³!',
        ]
        );



        $book = new Book;
        $book->title = $request->book_title;
        $book->pages = $request->book_pages;
        $book->isbn = $request->book_isbn;
        $book->short_description = $request->book_short_description;
        $book->author_id = $request->author_id;
        $book->save();
        return redirect()->route('book.index')->with('success_message', 'Sekmingai įrašyta.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        return view('book.show', ['book' => $book]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        $authors = Author::all();
        return view('book.edit', ['book' => $book, 'authors' => $authors]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {

        $request->validate(
        [
            'book_title' => ['required', 'min:3', 'max:64'],
            'book_pages' => ['required', 'integer', 'min:1', 'max:9999'],
            'book_isbn' => ['required', 'min:3', 'max:64'],
            'book_short_description' => ['required'],
            'author_id' => ['required', 'integer', 'min:1'],
        ],
        [
            'book_title.required' => 'Ä®raÅ¡ykite knygos pavadinimÄ…!',
            'book_title.min' => 'Per trumpas pavadinimas!',
            'book_title.max' => 'Per ilgas pavadinimas!',

            'book_pages.required' => 'Ä®raÅ¡ykite puslapiÅ³ skaiÄiÅ³!',
            'book_pages.integer' => 'Pateikite skaiÄiÅ³!',
            'book_pages.min' => 'Knygoje turi bÅ«ti bent vienas puslapis!',
            'book_pages.max' => 'Per didelis puslapiÅ³ skaiÄius!',

            'book_isbn.required' => 'Ä®raÅ¡ykite knygos ISBN kodÄ…!',
            'book_isbn.min' => 'Per trumpas ISBN kodas!',
            'book_isbn.max' => 'Per ilgas ISBN kodas!',

            'book_short_description.required' => 'Pateikite knygos apraÅ¡ymÄ…!',

            'author_id.min' => 'Pasirinkite autoriÅ³!',
        ]
        );



        $book->title = $request->book_title;
        $book->pages = $request->book_pages;
        $book->isbn = $request->book_isbn;
        $book->short_description = $request->book_short_description;
        $book->author_id = $request->author_id;
        $book->save();
        return redirect()->route('book.index')->with('success_message', 'Sėkmingai pakeista.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('book.index')->with('success_message', 'Sėkmingai ištrintas.');
    }

    public function pdf(Book $book)
    {
        $pdf = PDF::loadView('book.pdf', ['book' => $book]);
        return $pdf->download('book-id'.$book->id.'.pdf');

    }

}
