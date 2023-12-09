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
        Schema::create('oglasis', function (Blueprint $table) {
            $table->id();
            $table->string('vlasnik')->default('nepoznat prodavac');
            $table->string('ime');
            $table->string('path')->default('none');
            $table->text('opis')->nullable();
            $table->decimal('cena', 8, 2);
            $table->boolean('polovno')->default(true);
            $table->string('lokacija');
            $table->string('kategorija');
            $table->string('telefon');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('oglasis');
    }
};
