<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('electrodomestics', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('tipus');
            $table->string('marca');
            $table->decimal('preu',8,2);
            $table->text('descripcio')->nullable();
            $table->string('model');
            $table->integer('stock');
            $table->string('imatge')->nullable();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('electrodomestics');
    }
};
