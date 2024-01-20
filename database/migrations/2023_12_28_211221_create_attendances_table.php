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
        Schema::create('attendances', function (Blueprint $table) {
            $table->id();
            $table->string('idSt'); // Khóa ngoại liên kết với bảng sinh viên
            $table->unsignedBigInteger('idEvent'); // Khóa ngoại liên kết với bảng sự kiện
            $table->dateTime('attendance_date')->default(now());
            $table->timestamps();
            
            $table->foreign('idSt')->references('idSt')->on('members')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('idEvent')->references('id')->on('events')->onDelete('CASCADE')->onUpdate('CASCADE');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendances');

    }
};
