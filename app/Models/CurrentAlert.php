<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CurrentAlert extends Model
{
    use HasFactory;

    protected $fillable = [
        "alert_signal_id",
        "begin_date",
        "begin_time",
        "limitation",
        "reported_officer",
        "accepted_officer",
        "canceled"
    ];

    public function alertSignal()
    {
        return $this->belongsTo(AlertSignal::class);
    }
}
