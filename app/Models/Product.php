<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function categories()
    {
        return $this->belongsTo(Category::class);
    }

    public function providers()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function purchases()
    {
        return $this->belongsToMany(Purchase::class);
    }
}
