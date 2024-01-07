<?php

namespace App\Http\Controllers;

//import Model "Book
use App\Models\Book;

//return type View
use Illuminate\View\View;

//return type redirectResponse
use Illuminate\Http\RedirectResponse;

use Illuminate\Http\Request;

//import Facade "Storage"
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    /**
     * index
     *
     * @return View
     */
    public function index(): View
    {
        //get books
        $books = Book::latest()->paginate(5);

        //render view with books
        return view('books.index', compact('books'));
    }
 /**
     * create
     *
     * @return View
     */
    public function create(): View
    {
        return view('Books.create');
    }

    /**
     * store
     *
     * @param  mixed $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        //validate form
        $this->validate($request, [
            'image'     => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'title'     => 'required',
            'author'     => 'required',
            'year'   => 'required|min:4'
        ]);

       //upload image
       $image = $request->file('image');
       $image->storeAs('public/books', $image->hashName());

        //create book
        Book::create([
            'image'     => $image->hashName(),
            'title'     => $request->title,
            'author'     => $request->author,
            'year'   => $request->year
        ]);

        //redirect to index
        return redirect()->route('books.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }
    /**
     * show
     *
     * @param  mixed $id
     * @return View
     */
    public function show(string $id): View
    {
        //get book by ID
        $book = Book::findOrFail($id);

        //render view with book
        return view('Books.show', compact('book'));
    }

     /**
     * edit
     *
     * @param  mixed $id
     * @return View
     */
    public function edit(string $id): View
    {
        //get book by ID
        $book = Book::findOrFail($id);

        //render view with book
        return view('books.edit', compact('book'));
    }
    
    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id): RedirectResponse
    {
        //validate form
        $this->validate($request, [
            'image' => 'required',
            'title'     => 'required',
            'author'     => 'required',
            'year'   => 'required|min:4'
        ]);

        //get book by ID
        $book = Book::findOrFail($id);

       

            //update book with new image
            $book->update([
                'image' => $request->image,
                'title'     => $request->title,
                'author'     => $request->author,
                'year'   => $request->year
            ]);
//check if image is uploaded
if ($request->hasFile('image')) {

    //upload new image
    $image = $request->file('image');
    $image->storeAs('public/books', $image->hashName());

    //delete old image
    Storage::delete('public/books/'.$book->image);

    //update book with new image
    $book->update([
        'image'     => $image->hashName(),
        'title'     => $request->title,
        'author'     => $request->author,
        'year'   => $request->year
    ]);

} else {

    //update book without image
    $book->update([
        'title'     => $request->title,
                'author'     => $request->author,
                'year'   => $request->year
    ]);
}

        //redirect to index
        return redirect()->route('books.index')->with(['success' => 'Data Berhasil Diubah!']);
    }
    /**
     * destroy
     *
     * @param  mixed $book
     * @return void
     */
    public function destroy($id): RedirectResponse
    {
        //get book by ID
        $book = Book::findOrFail($id);

        //delete image
        Storage::delete('public/books/'. $book->image);

        //delete book
        $book->delete();

        //redirect to index
        return redirect()->route('books.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}