<?php

namespace App\Http\Controllers;

//import Model "Borrower
use App\Models\Borrower;

//return type View
use Illuminate\View\View;

//return type redirectResponse
use Illuminate\Http\RedirectResponse;

use Illuminate\Http\Request;

//import Facade "Storage"
use Illuminate\Support\Facades\Storage;

class BorrowerController extends Controller
{
    /**
     * index
     *
     * @return View
     */
    public function index(): View
    {
        //get Borrower
        $borrowers = Borrower::latest()->paginate(5);

        //render view with Borrower
        return view('Borrowers.index', compact('borrowers'));
    }/**
     * create
     *
     * @return View
     */
    public function create(): View
    {
        return view('Borrowers.create');
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
            'nama'     => 'required',
            'no_telp'     => 'required|min:5',
            'nim'   => 'required|min:5'
        ]);

       

        //create borrower
        Borrower::create([
            'nama'     => $request->nama,
            'no_telp'     => $request->no_telp,
            'nim'   => $request->nim
        ]);

        //redirect to index
        return redirect()->route('borrowers.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }
    /**
     * show
     *
     * @param  mixed $id
     * @return View
     */
    public function show(string $id): View
    {
        //get borrower by ID
        $borrower = Borrower::findOrFail($id);

        //render view with borrower
        return view('Borrowers.show', compact('borrower'));
    }

     /**
     * edit
     *
     * @param  mixed $id
     * @return View
     */
    public function edit(string $id): View
    {
        //get borrower by ID
        $borrower = Borrower::findOrFail($id);

        //render view with borrower
        return view('borrowers.edit', compact('borrower'));
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
            'nama'     => 'required',
            'no_telp'     => 'required|min:5',
            'nim'   => 'required|min:5'
        ]);

        //get borrower by ID
        $borrower = Borrower::findOrFail($id);

       

            //update borrower with new image
            $borrower->update([
                'nama'     => $request->nama,
                'no_telp'     => $request->no_telp,
                'nim'   => $request->nim
            ]);


        //redirect to index
        return redirect()->route('borrowers.index')->with(['success' => 'Data Berhasil Diubah!']);
    }
}