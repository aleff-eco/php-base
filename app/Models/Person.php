<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;
    protected $table = 'people';
    protected $guarded = ['id'];

    public function setNamesAttribute($value)
    {
        $this->attributes['names'] = ucwords(strtolower($value));
    }

    public function setSurnamesAttribute($value)
    {
        $this->attributes['surnames'] = ucwords(strtolower($value));
    }
}
