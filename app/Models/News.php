<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['title', 'content'];

    public function images()
    {
        return $this->hasMany(NewsImage::class);
    }
}
