<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('order_items')) {
            Schema::create('order_items', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('quantity')->default(1)->nullable();
                $table->unsignedDecimal('item_price', 16, 2)->default(0.00)->nullable();
                $table->timestamps();
            });
        }
        Schema::table('order_items', function (Blueprint $table) {
            $table->foreignId('product_id')
                ->after('id')
                ->nullable()
                ->constrained()
                ->cascadeOnUpdate()
                ->onDelete('RESTRICT');
        });
        Schema::table('order_items', function (Blueprint $table) {
            $table->foreignId('order_id')
                ->after('id')
                ->nullable()
                ->constrained()
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('order_items', function (Blueprint $table) {
            $table->dropForeign(['order_id', 'product_id']);
        });
        Schema::dropIfExists('order_items');
    }
}
