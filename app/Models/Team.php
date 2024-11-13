<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Team extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'original_name',
        'country',
        'summary',
        'description',
        'logo'
    ];

    public function setLogoAttribute($value)
    {
        if ($value) {
            $filename = $value->store('images', 'public');
            $this->attributes['logo'] = $filename;
        }
    }
}
