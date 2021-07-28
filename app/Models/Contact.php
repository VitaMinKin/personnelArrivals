<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        "mobile_phone_number"
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
