<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suppliers extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'contact_person',
        'contact_address',
        'contact_phone',
        'contact_email',
    ];
    public function products()
    {
        return $this->hasMany(Products::class);
    }
}
