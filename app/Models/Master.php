<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Master extends Model
{
    use HasFactory;

    protected $table = 'master';

    protected $fillable = [
        'title',
        'id_collection',
        'publish_status',
        'last_activity_date',
        'image',
        'sinopsis',
        'tag',
        'genre',
        'airing_status',
        'rating',
        'total_views',
        'total_streams',
        'size',
        'created_by',
        'active',
        'id_collection',
        'guid_collection',
        'videoCount_collection',
        'size_collection'
    ];

}
