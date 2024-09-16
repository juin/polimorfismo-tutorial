<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Estado extends Model
{
    protected $fillable = ['nome', 'sigla', 'pais_id'];

    public function pais(): BelongsTo
    {
        return $this->belongsTo(Pais::class, 'pais_id');
    }

    public function coordenadores(): MorphMany
    {
        return $this->morphMany(Coordenador::class, 'coordenadorable');

    }
}
