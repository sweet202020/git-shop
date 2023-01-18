<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\Material;


class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'description', 'price'
    ];


    public function Material(): BelongsToMany
    {
        return $this->belongsToMany(Material::class);
    }
}
