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
            $table->id()->comment('喫煙本数履歴ID');
            $table->foreignId('brand_id')->comment('銘柄ID')
                ->constrained()
                ->restrictOnUpdate()
                ->restrictOnDelete();
            $table->foreignId('user_id')->comment('ユーザーID')
                ->constrained()
                ->restrictOnUpdate()
                ->restrictOnDelete();
            $table->string('brand_name')->comment('銘柄名');
            $table->unsignedSmallInteger('count')->default(0)->comment('喫煙本数');
            $table->decimal('per_price')->default(0)->comment('1本あたりの金額');
            $table->decimal('amount')->default(0)->comment('合計金額');
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
