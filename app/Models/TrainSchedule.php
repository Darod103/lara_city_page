<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainSchedule extends Model
{
    use HasFactory;

    protected $table = 'train_schedules';
    protected $fillable = [
        'departure_location',
        'departure_date',
        'departure_time',
        'arrival_location',
        'arrival_date',
        'arrival_time',
    ];

    public function setDepartureDateAttribute($value)
    {
        $this->attributes['departure_date'] = Carbon::parse($value)->format('Y-m-d');
    }

    public function setArrivalDateAttribute($value)
    {
        $this->attributes['arrival_date'] = Carbon::parse($value)->format('Y-m-d');
    }


    public function getDepartureDateAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y');
    }


    public function getArrivalDateAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y');
    }

}
