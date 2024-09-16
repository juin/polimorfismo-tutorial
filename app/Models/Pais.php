<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Pais extends Model
{
    protected $table = 'paises';

    protected $fillable = ['nome'];

    public function coordenadores(): MorphMany
    {
        return $this->morphMany(Coordenador::class, 'coordenadorable');

    }
}
