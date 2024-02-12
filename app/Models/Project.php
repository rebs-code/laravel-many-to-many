<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    //this tells that all the fields in the table can be mass-assigned, slug is guarded meaning that cannot be modified
    protected $guarded = ['slug'];

    public function type()
    {
        //a project belongs to a type
        return $this->belongsTo(Type::class);
    }
}
