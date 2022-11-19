<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Casts\Attribute;

class User extends Authenticatable
{   
    use HasFactory;
    use HasApiTokens, HasFactory, Notifiable;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = ucfirst($value);
    }

    public function state()
    {
        return $this->belongsTo(Department::class);
    }

    /* Relación muchos a muchos */
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function purchases()
    {
        return $this->hasMany(Purchase::class);
    }

    /* Relación uno a muchos */
    public function deparmment()
    {
        return $this->hasOne(Department::class);
    }

    public function documentType()
    {
        return $this->belongsTo(DocumentType::class);
    }
    
}
