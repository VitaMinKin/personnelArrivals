<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        "military_rank",
        "full_name",
        "position"
    ];

    public function contact()
    {
        return $this->hasOne(Contact::class);
    }

    public function highAlerts()
    {
        return $this->belongsToMany(HighAlert::class);
    }

}
