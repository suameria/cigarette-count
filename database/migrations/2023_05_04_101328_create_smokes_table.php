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
        Schema::create('smokes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('brand_id')->comment('銘柄ID');
            $table->unsignedBigInteger('user_id')->comment('ユーザーID');
            $table->unsignedSmallInteger('count')->comment('吸った本数');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('smokes');
    }
};
