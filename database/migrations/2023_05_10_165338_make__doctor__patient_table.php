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
        Schema::create('Doctor_Patient', function (Blueprint $table) {
            $table->integer('Doctor_ID')->auto_increment();
            $table->Primary('Doctor_ID');
            $table->integer('Patient_ID');
            $table->date('Time');

            $table->foreign('Doctor_ID')->references('Doctor_id')->on('Doctor')->onDelete('cascade');
            $table->foreign('Patient_ID')->references('Patient_id')->on('Patient')->onDelete('cascade');
            


            $table->timestamps();
        });
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Test');
    }
};
