<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Technology extends Model
{
    use HasFactory;

    protected $guarded = ['slug'];

    public function projects()
    {
        //a technology can have many projects
        return $this->belongsToMany(Project::class);
    }
}
