<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Cidade extends Model
{
    protected $fillable = ['nome', 'estado_id'];

    public function estado(): BelongsTo
    {
        return $this->belongsTo(Estado::class, 'estado_id');
    }

    public function coordenadors(): MorphMany
    {
        return $this->morphMany(Coordenador::class, 'coordenadorable');

    }
}
