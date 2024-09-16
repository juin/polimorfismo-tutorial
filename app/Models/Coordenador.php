<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Coordenador extends Model
{
    protected $table = 'coordenadores';

    protected $fillable = ['user_id', 'cargo_id', 'coordenadorable_id', 'coordenadorable_type'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function cargo(): BelongsTo
    {
        return $this->belongsTo(Cargo::class);
    }

    /**
     * Obtenha o modelo pai imaginável (Cidade, Estado ou Pais).
     */
    public function coordenadorable(): MorphTo
    {
        return $this->morphTo();
    }
}
