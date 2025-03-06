<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Potluck extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'date'];

    public function items()
    {
        return $this->hasMany(Item::class);
    }
}
