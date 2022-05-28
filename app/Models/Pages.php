<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pages extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'hasChildMenu',
        'externalLink',
        'Image1',
        'Document1',
        'Image2',
        'Document2',
        'Image3',
        'Document3',
        'created_at',
        'updated_at',
        ];
}
