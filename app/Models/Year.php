<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Year extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'title'       
    ];

    public function items()
    {
        return $this->hasMany(Item::class);
    }
}
