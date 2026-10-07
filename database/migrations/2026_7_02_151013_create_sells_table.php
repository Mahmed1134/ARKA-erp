<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sells', function (Blueprint $table) {

            $table->id();

            $table->string('code', 255);

            $table->longText('name')->nullable();

            $table->bigInteger('qty')->default(0);

            $table->string('warehouse', 255);

            // ✅ سعر البيع وقت العملية
            $table->decimal('price', 12, 2)->default(0);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sells');
    }
};