<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    use HasFactory;

    protected $table = 'votes';

    protected $fillable = ['user_id', 'picture_id'];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function picture(){
        return $this->belongsTo('App\Models\Picture');
    }
}
