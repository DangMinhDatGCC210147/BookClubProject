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
        Schema::create('funds', function (Blueprint $table) {
            $table->id();
            $table->string('idSt')->unique();
            $table->tinyInteger('jan')->default(0);
            $table->tinyInteger('feb')->default(0);
            $table->tinyInteger('mar')->default(0);
            $table->tinyInteger('apr')->default(0);
            $table->tinyInteger('may')->default(0);
            $table->tinyInteger('jun')->default(0);
            $table->tinyInteger('jul')->default(0);
            $table->tinyInteger('aug')->default(0);
            $table->tinyInteger('sep')->default(0);
            $table->tinyInteger('oct')->default(0);
            $table->tinyInteger('nov')->default(0);
            $table->tinyInteger('dec')->default(0);
            $table->integer('total')->default(0);
            $table->timestamps();

            // Mối quan hệ khoá ngoại
            $table->foreign('idSt')->references('idSt')->on('members')->onDelete('CASCADE')->onUpdate('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('funds');
    }
};
