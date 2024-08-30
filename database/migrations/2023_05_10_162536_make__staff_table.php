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
        Schema::create('Staff', function (Blueprint $table) {
            $table->integer('Staff_id');
            $table->string('Job_tittle',15);
            $table->integer('S_Worker_ID');
            $table->Primary('Staff_id');
            $table->foreign('S_Worker_ID')->references('Worker_id')->on('Worker')->onDelete('cascade');
            $table->timestamps();
        });
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Staff');

    }
};
