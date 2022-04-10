<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Series extends Model
{
    public $timestamps = false;
    protected $fillable = ['name'];
//    protected $perPage = 3;
    protected $appends = ['links'];

    public function episode(): HasMany
    {
        return $this->hasMany(Episode::class);
    }

    public function getLinksAttribute($links): array
    {
        return [
            "self" => "/api/series/$this->id",
            "episodes" => "/api/series/$this->id/episodes"
        ];
    }
}
