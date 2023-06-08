<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
class Project extends Model
{
    use HasFactory;
    protected $fillable = ['title','repo', 'slug', 'date', 'type_id'];

    public static function createRepo($projectTitle) {
        $repo = 'https://github.com/robertonesta/' . Str::slug($projectTitle, '-');
        return $repo;
    }

    public static function createSlug($projectTitle) {
        $slug = Str::slug($projectTitle, '-');
        return $slug;
    }

    public function type(): BelongsTo{
        return $this->belongsTo(Type::class);
    }

    public function technologies(): belongsToMany {
        return $this->belongsToMany(Technology::class);
    }
}
