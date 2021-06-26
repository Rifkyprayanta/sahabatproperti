<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\User;

class Information extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';

    protected $fillable = [
        'title',
        'description',
        'image',
        'user_id',
        'category_id'
    ];

    /**
     * Get the category for the Information post.
     */

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
