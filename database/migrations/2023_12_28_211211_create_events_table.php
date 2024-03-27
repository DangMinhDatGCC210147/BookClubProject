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
        Schema::create('events', function (Blueprint $table) {
            $table->id()->constrained()->onDelete('CASCADE');
            $table->string('image')->nullable();
            $table->string('nameEvent');
            $table->date('date');
            $table->string('venue');
            $table->integer('score');
            $table->longText('description_1')->nullable();
            $table->longText('description_2')->nullable();
            $table->longText('description_3')->nullable();
            $table->longText('description_4')->nullable();
            $table->text('comments')->nullable();
            $table->time('time_start');
            $table->time('time_end');
            $table->integer('status');
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
