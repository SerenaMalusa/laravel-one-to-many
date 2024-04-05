<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    // use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'repository',
        'github_link',
        'creation_date',
        'last_commit'
    ];

    public function type()
    {
        return $this->belongsTo(Type::class);
    }
}
