<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Mockery\Generator\StringManipulation\Pass\RemoveUnserializeForInternalSerializableClassesPass;

class tasks extends Model
{
    
    use HasFactory;

    protected $table = 'tasks';

    
    protected $fillable = [
        'title',
        'desctription',
        'status',
    ];
}
