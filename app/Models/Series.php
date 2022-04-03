<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Series extends Model
{
    public $timestamps = false;
    protected $fillable = ['name'];

    public function episode(): HasMany
    {
        return $this->hasMany(Episode::class);
    }
}
