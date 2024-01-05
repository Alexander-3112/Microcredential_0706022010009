<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Borrower extends Model
{
    protected $fillable = [
        'nama','no_telp','nim'
        // Atribut lain yang mungkin perlu diisi secara masif
    ];
}
