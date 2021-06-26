<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Information;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'role_name',
        'description',
    ];

    public function information()
    {
        return $this->hasMany(Information::class);
    }
}
