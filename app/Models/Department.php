<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user()
    {
        return $this->hasMany(User::class);
    }

    public function supplier()
    {
        return $this->hasMany(Supplier::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}
