<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    use HasFactory;

    protected $table = 'pictures';
    protected $fillable = ['user_id', 'url'];

    public function user() {
        return $this->belongsTo('App\Models\User');
    }

    public function votes() {
        return $this->hasMany('App\Models\Vote');
    }

    public function voteCount()
    {
        $this->votes()->count();
    }

}
