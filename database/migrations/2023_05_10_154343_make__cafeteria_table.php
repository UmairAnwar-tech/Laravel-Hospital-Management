<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('Cafeteria', function (Blueprint $table) {
            $table->integer('Cafeteria_id')->nullable();
            $table->Primary('Cafeteria_id');
            $table->string('Food_Type', 15)->nullable();
            $table->smallInteger('Seating')->nullable();
            $table->timestamps();
        });
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Cafeteria');

    }
};
