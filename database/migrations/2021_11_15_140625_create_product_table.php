<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Products', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';
            $table->id()->index();
            $table->string('name', 50)->nullable();
            $table->text('description')->nullable();
            $table->unsignedDecimal('price', $precision = 16, $scale = 2)->nullable();
            $table->unsignedTinyInteger('status')->nullable();
            // $table->foreign('category_id')->references('id')->on('Categories')->onDelete('cascade');
            $table->foreignId('category_id')->nullable()
                  ->constrained('Categories')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Products');
    }
}
