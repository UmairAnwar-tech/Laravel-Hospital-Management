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
        Schema::create('Cafeteria_Staff', function (Blueprint $table) {
            $table->integer('Staff_id')->nullable();
            $table->integer('Cafeteria_id');
            
            $table->string('Position',15);
            $table->foreign('Staff_id')->references('Staff_id')->on('Staff')->onDelete('cascade');
            $table->foreign('Cafeteria_id')->references('Cafeteria_id')->on('Cafeteria')->onDelete('cascade');
            
            $table->timestamps();
        });
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Cafeteria_Staff');

    }
};
