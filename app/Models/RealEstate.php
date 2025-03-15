<?php

namespace App\Models;

use Illuminate\Database\Eloquent\{Model,SoftDeletes};
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RealEstate extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $fillable = [
        'name', 'real_estate_type', 'street', 'external_number', 'internal_number', 
        'neighborhood', 'city', 'country', 'rooms', 'bathrooms', 'comments'
    ];
}
