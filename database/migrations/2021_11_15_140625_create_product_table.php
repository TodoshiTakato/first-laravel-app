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
