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
        'description',
        'status',
        'category_id',
        'year_id',        
    ];


    public function category(): BelongsTo
    {   
        return $this->belongsTo(Category::class);
    }

    public function year(): BelongsTo
    {
        return $this->belongsTo(Year::class);
    }

    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'item_genre');
    }
    
    public function countries()
    {
        return $this->belongsToMany(Country::class, 'item_country');
    }

    public function participants()
    {
        return $this->belongsToMany(Participant::class, 'item_participant');
    }

}
