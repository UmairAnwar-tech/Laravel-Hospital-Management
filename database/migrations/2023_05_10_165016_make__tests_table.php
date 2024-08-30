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
        Schema::create('Test', function (Blueprint $table) {
            $table->biginteger('Test_id');
            $table->Primary('Test_id')->auto_increment();
            $table->integer('Doctor_ID');
            $table->integer('Patient_ID');
            $table->string('illness');
            $table->integer('Result');

            $table->foreign('Doctor_ID')->references('Doctor_id')->on('Doctor')->onDelete('cascade');
            $table->foreign('Patient_ID')->references('Patient_id')->on('Patient')->onDelete('cascade');
            $table->foreign('illness')->references('illness')->on('Diagnosis')->onDelete('cascade');


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
