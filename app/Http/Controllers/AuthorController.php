<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Http\Requests\StoreAuthorRequest;
use App\Http\Requests\UpdateAuthorRequest;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $authors = Author::all();
        $authors = $authors->sortBy('surname');
        return view('authors.index', compact('authors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('authors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAuthorRequest $request)
    {
        $request->validate(
            [
                'author_name' => ['required', 'min:3', 'max:64'],
                'author_surname' => ['required', 'min:3', 'max:64'],
                'author_portret' =>  ['sometimes', 'mimes:jpeg,jpg,png,gif'],
            ],
            [
                'author_name.required' => 'Įrašykite vardą!',
                'author_name.min' => 'Per trumpas vardas!',
                'author_name.max' => 'Per ilgas vardas!',
                'author_surname.required' => 'Įrašykite pavardę!',
                'author_surname.min' => 'Per trumpa pavardė!',
                'author_surname.max' => 'Per ilga pavardė!',
                'author_portret.mimes' => 'Failai galimi tik jpg, gif, png formato!',
            ]
        );
        $author = new Author();
        $author->name = $request->author_name;
        $author->surname = $request->author_surname;
        if ($request->hasFile('author_portret')) {
            $author->portret = $request->author_portret->store('public/portret');
            // $portret = $request->file('author_portret');
            // $imageName =
            // $request->author_name. '-' .
            // $request->author_surname. '-' .
            // time(). '.' .
            // $portret->getClientOriginalExtension();
            // $path = public_path() . '/portrets/';
            // $url = asset('portrets/'.$imageName);
            // $portret->move($path, $imageName);
            // $author->portret = $url;
        }
        $author->save();
        return redirect()->route('authors.index')->with('success_message', 'Sekmingai įrašytas.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Author $author)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Author $author)
    {
        return view('author.edit',['author' => $author]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAuthorRequest $request, Author $author)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Author $author)
    {
        //
    }
}
