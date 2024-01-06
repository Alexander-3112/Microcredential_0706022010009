<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Borrowing extends Model
{
    use HasFactory;
    protected $table = 'borrowing';

    protected $primaryKey = 'id_peminjaman';

    protected $fillable = [
        'id_buku',
        'id_nama',
        'tanggal_pinjam',
        'tanggal_kembali',
    ];

    public function book()
    {
        return $this->belongsTo(Book::class, 'id_buku', 'id');
    }

    public function borrower()
    {
        return $this->belongsTo(Borrower::class, 'id_nama', 'id');
    }
}

