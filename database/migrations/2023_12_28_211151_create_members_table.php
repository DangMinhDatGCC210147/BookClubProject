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
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('idSt')->unique();
            $table->string('image')->nullable();
            $table->string('name', 100);
            $table->integer('gender');
            $table->date('dateOfBirth');
            $table->string('course', 5);
            $table->string('email');
            $table->string('phoneNumber');
            $table->date('joiningDate');
            $table->timestamps();

            $table->foreign('idSt')->references('idSt')->on('users')->onDelete('CASCADE')->onUpdate('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};
