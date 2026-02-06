<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('producto', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('marca');
            $table->string('precio');
            $table->unsignedBigInteger('id_cat');
            $table->timestamps();


            $table->foreign('id_cat')
                  ->references('id_cat')
                  ->on('categoria')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('producto');
    }
};
