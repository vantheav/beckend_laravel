<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Book::latest()->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'min:3|max:10',
            'body'=>'min:3|max:50',
        ]);

        $book = new Book();
        $book -> author_id  = $request ->author_id;
        $book -> title = $request ->title;
        $book -> body = $request -> body;

        $book->save();

        return response()->json(['message'=>'Book Created','data'=>$book],201);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Book::with('author')->findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title'=>'min:3|max:10',
            'body'=>'min:3|max:50',
        ]);

        $book = Book::findOrFail($id);
        $book -> author_id  = $request ->author_id;
        $book -> title = $request ->title;
        $book -> body = $request -> body;

        $book->save();

        return response()->json(['message'=>'Book Updated','data'=>$book],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Book::destroy($id);
    }
}
