<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('coordenadores', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('cargo_id')->constrained();
            $table->morphs('coordenadorable');
            $table->unique(['cargo_id', 'coordenadorable_id', 'coordenadorable_type'], 'user_cargo_local_unique');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('coordenadores');
    }
};
