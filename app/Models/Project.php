<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $table = 'project';

    protected $fillable= [
        "title",
        "content",
        "cover_image",
        "slug",
    ];

    public static function generateSlug($title){
        return Str::slug($titlr, '-');
    }
}
