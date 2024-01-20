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
        Schema::create('member_event', function (Blueprint $table) {
            $table->id();
            $table->string('idSt');
            $table->unsignedBigInteger('idEvent');
            $table->integer('status');
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
        Schema::dropIfExists('member_event');
    }
};
