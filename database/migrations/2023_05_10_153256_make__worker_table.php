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
        Schema::create('Worker', function (Blueprint $table) {
            $table->integer('Worker_id')->auto_increment();
            $table->primary('Worker_id');
            $table->string('fname', 10);
            $table->string('lname', 10);
            $table->char('Gender', 1)->nullable();
            $table->string('telephone', 14)->nullable();
            $table->integer('Salary')->nullable();
            $table->timestamps();
        });
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Worker');

    }
};
