<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','title','text','image_url'];

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
