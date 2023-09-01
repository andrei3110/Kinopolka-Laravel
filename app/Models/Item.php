<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Item extends Model
{
    use HasFactory;
    
    public $timestamps = false;

    protected $fillable = [
        'name',
        'image',
        'country',
        'year',
        'description',
        'status',
        'category_id',        
    ];


    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'item_genre');
    }

    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'item_genre');
    }

}
