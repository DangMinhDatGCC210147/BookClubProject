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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('nameSt');
            $table->string('idSt')->unique();
            $table->string('image')->nullable();
            $table->string('email');
            $table->longText('link')->nullable();
            $table->longText('description_1')->nullable();
            $table->longText('description_2')->nullable();
            $table->date('submission_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
