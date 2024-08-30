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
        Schema::create('Doctor', function (Blueprint $table) {
            $table->integer('Doctor_id')->auto_increment();
            $table->string('field',10);
            $table->string('doctor_name');
            $table->string('degree',20);
            $table->integer('Department_ID');
            $table->integer('D_Worker_ID')->nullable();
            $table->Primary('Doctor_id');
            $table->string('image');
            $table->foreign('Department_ID')->references('Department_id')->on('Department')->onDelete('cascade');
            $table->foreign('D_Worker_ID')->references('Worker_id')->on('Worker')->onDelete('cascade');
            $table->timestamps();
        });
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Doctor');

    }
};


