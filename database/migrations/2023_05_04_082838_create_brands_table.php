<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('brands', function (Blueprint $table) {
            $table->id()->comment('銘柄ID');
            $table->unsignedBigInteger('user_id')->comment('ユーザーID');
            $table->string('name')->comment('銘柄名');
            $table->decimal('price')->comment('税込金額');
            $table->unsignedTinyInteger('number')->default(20)->comment('1箱の本数');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('brands');
    }
};
