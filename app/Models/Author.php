<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'email', 'telephone'];
    public $timestamps = false; // Baris ini menonaktifkan timestamps untuk model

    public function articles()
    {
        return $this->hasMany(Article::class);
    }
}


