<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
     /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'image',
        'title',
        'author',
        'year',
    ];

    public function borrowing(){
        return $this->hasMany(Borrowing::class, 'id', 'id_buku');
    }
}
