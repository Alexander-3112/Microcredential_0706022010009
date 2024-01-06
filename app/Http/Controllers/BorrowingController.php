<?php

namespace App\Http\Controllers;

use App\Models\Borrowing;
use App\Models\Book; // Tambahkan import untuk model Book
use App\Models\Borrower; // Tambahkan import untuk model Borrower
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class BorrowingController extends Controller
{
    public function index()
    {
        $borrowing = Borrowing::all();
        return view('borrowing.index', compact('borrowing'));
    }

    public function create()
    {
        // Ambil data buku dan borrower
        $books = Book::all();
        $borrowers = Borrower::all();

        // Kirim data ke view
        return view('borrowing.create', compact('books', 'borrowers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_book' => 'required|exists:books,id',
            'id_borrower' => 'required|exists:borrowers,id',
            'tanggal_pinjam' => 'required|date',
            'tanggal_kembali' => 'date',
        ]);

        // Implementasikan logika untuk menyimpan data peminjaman
        // Borrowing::create($request->all());
        Borrowing::create([
            'id_buku'     => $request->id_book,
            'id_nama'     => $request->id_borrower,
            'tanggal_pinjam'   => $request->tanggal_pinjam,
           'tanggal_kembali' => $request->tanggal_kembali,
        ]);

        return redirect()->route('borrowings.index')->with('success', 'Data Borrowing berhasil ditambahkan');
    }
}
