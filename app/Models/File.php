<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    protected function name()
    {
        return \Attribute::make(get:fn($value)=> url('uploads/', $value));
    }
}
