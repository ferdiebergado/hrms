<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Travel;

class Employee extends Model
{
    protected $fillable = [
        'lastname'
    ];

    public function travels()
    {
        return $this->belongsToMany(Travel::class);
    }

    public static function withTravelByDate($date)
    {
        return self::with(['travels' => function ($q) use ($date) {
            $q->whereDate('startdate', '<=', $date)->whereDate('enddate', '>=', $date);
        }])->get();
    }

    public static function withoutTravelByDate($date)
    {
        return self::whereDoesntHave('travels', function ($q) use ($date) {
            $q->whereDate('startdate', '<=', $date)->whereDate('enddate', '>=', $date);
        })->get();
    }
}
