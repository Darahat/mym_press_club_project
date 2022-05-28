<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'userId',
        'thumbnailImage',
        'Document1',
        'Document2',
        'Document3',
        'created_at',
        'updated_at',
        ];
}
