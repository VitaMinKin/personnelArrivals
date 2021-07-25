<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlertSignal extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function alerts()
    {
        return $this->hasMany(CurrentAlert::class);
    }
}
