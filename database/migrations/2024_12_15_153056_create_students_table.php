<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('firstname');
            $table->enum('gender', ['male','female'])->default('male');
            $table->date('birth_date');
            $table->string('email')->unique();
            $table->string('phone', 15);
            $table->text('adress')->nullable();

            //relations
            $table->foreignId('course_id')->constrained;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
