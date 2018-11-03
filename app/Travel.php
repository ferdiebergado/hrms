<?php

namespace App;

use App\Employee;
use App\BaseModel;
use Illuminate\Database\Eloquent\Model;

class Travel extends Model
{
    protected $fillable = [
        'activity',
        'venue',
        'startdate',
        'enddate'
    ];

    public function employees()
    {
        return $this->belongsToMany(Employee::class);
    }

    public static function findEmployeesOnTravelByDate($date)
    {
        return self::with('employees')->whereDate('startdate', '<=', $date)->whereDate('enddate', '>=', $date)->get();
    }
}
