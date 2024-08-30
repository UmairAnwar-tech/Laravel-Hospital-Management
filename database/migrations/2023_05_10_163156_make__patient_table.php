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
        Schema::create('Patient', function (Blueprint $table) {
            $table->integer('Patient_id')->nullable();
            $table->Primary('Patient_id');
            
            $table->string('fname',10)->nullable();
            $table->string('lname',10)->nullable();
            $table->text('Address')->nullable();
            $table->string('telephone',14)->nullable();
            $table->string('gender',5)->nullable();
            $table->integer('age')->nullable();
            $table->string('Blood_type',5)->nullable();
            $table->integer('Cafeteria_id')->nullable();
            $table->integer('Bill_id')->nullable();

            
            $table->foreign('Bill_id')->references('Bill_id')->on('Bill')->onDelete('cascade');
            $table->foreign('Cafeteria_id')->references('Cafeteria_id')->on('Cafeteria')->onDelete('cascade');
            
            $table->timestamps();
        });
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Patient');

    }
};
