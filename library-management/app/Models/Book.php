<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    // Allow mass assignment for these fields
    protected $fillable = ['title', 'author', 'year', 'quantity'];

    // Disable timestamps if not used
    public $timestamps = false;
}
