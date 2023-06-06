<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Project extends Model
{
    use HasFactory;
    protected $fillable = ['title','repo', 'slug', 'date'];

    public static function createRepo($projectTitle) {
        $repo = 'https://github.com/robertonesta/' . Str::slug($projectTitle, '-');
        return $repo;
    }

    public static function createSlug($projectTitle) {
        $slug = Str::slug($projectTitle, '-');
        return $slug;
    }

}
