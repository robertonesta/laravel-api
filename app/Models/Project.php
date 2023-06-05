<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Project extends Model
{
    use HasFactory;
    protected $fillable = ['title','repo', 'date'];

    public static function createRepo($projectTitle) {
        $repo = 'https://github.com/robertonesta' . Str::slug($projectTitle, '-');
        return $repo;
    }
}
