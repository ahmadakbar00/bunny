<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    protected $table = 'video';

    protected $fillable = [
        'title',
        'id_collection',
        'id_vidio',
        'publish_status',
        'last_activity_date',
        'image',
        'rating',
        'total_views',
        'size',
        'created_by',
        'active',
    ];
}
