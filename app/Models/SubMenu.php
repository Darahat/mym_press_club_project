<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubMenu extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'hasChildMenu',
        'externalLink',
        'Document1',
        'Document2',
        'Document3',
        'created_at',
        'updated_at',
        ];
}
