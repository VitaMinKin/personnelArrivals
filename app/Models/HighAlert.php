<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HighAlert extends Model
{
    use HasFactory;

    protected $fillable = [
        "notifying_officer",
        "alert_signal",
        "time_alert"
    ];

    public $timestamps = false;

    public function employee()
    {
        return $this->belongsToMany(Employee::class);
    }
}
