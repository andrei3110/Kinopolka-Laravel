<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'title',
    ];

    public function items()
    {
        return $this->belongsToMany(Item::class);
    }
}
