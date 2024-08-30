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
        Schema::create('Medication_prescribed', function (Blueprint $table) {
            $table->integer('Prescription_id')->auto_increment();
            $table->Primary('Prescription_id');
            $table->integer('Medication_ID');
            $table->integer('Patient_ID');

            $table->foreign('Medication_ID')->references('Medication_id')->on('Medication')->onDelete('cascade');
            $table->foreign('Patient_ID')->references('Patient_id')->on('Patient')->onDelete('cascade');

            
            $table->timestamps();
        });
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Medication_prescribed');

    }
};
