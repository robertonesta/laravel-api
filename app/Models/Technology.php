<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\Project;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Technology extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function projects(): belongsToMany {
        return $this->belongsToMany(Project::class);
    }

    public function user(): belongsTo {
        return $this->belongsTo(User::class);
    }
}
