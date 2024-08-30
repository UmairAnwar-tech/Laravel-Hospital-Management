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
        Schema::create('Bill', function (Blueprint $table) {
            $table->integer('Bill_id')->nullable();
            $table->Primary('Bill_id');
            $table->string('Tests', 25)->nullable();
            $table->string('Treatment', 25)->nullable();
            $table->date('Time_added');
            $table->string('Prescription', 25)->nullable();
            $table->timestamps();
        });
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Bill');

    }
};
