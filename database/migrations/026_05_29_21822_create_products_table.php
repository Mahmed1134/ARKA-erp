<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {

            $table->id();

            // ✅ لازم string عشان يقدر ياخد UNIQUE KEY (text/longText ماينفعش)
            $table->string('code', 255);

            $table->longText('name')->nullable();

            $table->bigInteger('qty')->default(0);

            $table->string('warehouse', 255);

            // ✅ سعر الشراء وسعر البيع
            $table->decimal('purchase_price', 12, 2)->default(0);
            $table->decimal('sale_price', 12, 2)->default(0);

            $table->timestamps();

            // ✅ عشان ON DUPLICATE KEY UPDATE يشتغل صح ويجمّع الكمية
            
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};