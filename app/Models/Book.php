<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'pages',
        'isbn',
        'short_description',
        'author_id',
    ];

    public function bookAuthor()
    {
        return $this->belongsTo('App\Models\Author', 'author_id', 'id');
    }

}
