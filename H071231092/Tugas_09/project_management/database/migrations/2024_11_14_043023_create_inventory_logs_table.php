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
        Schema::create('inventorylog', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->nullable()->constrained('product')->onDelete('cascade');
            $table->enum('type', ['new', 'sold', 'restock', 'remove']);
            $table->integer('quantity');
            $table->date('date');
            $table->timestamp('timestamps')->useCurrent();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventory_logs');
    }
};
