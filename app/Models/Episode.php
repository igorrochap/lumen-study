<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Episode extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'season',
        'number',
        'watched'
    ];

    public function series(): BelongsTo
    {
        return $this->belongsTo(Series::class);
    }
}
