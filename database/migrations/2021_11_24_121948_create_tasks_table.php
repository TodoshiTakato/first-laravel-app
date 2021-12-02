<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';
            $table->id();
            $table->string('name', 255)->nullable();
            $table->text('details')->nullable();
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('cascade');
//            $table->foreignId('rating_id')->nullable()->constrained('ratings')->onUpdate('cascade');
            $table->timestamps();
        });

//        Schema::table('tasks', function (Blueprint $table) {
//            $table->foreignId('user_id')->after('details')->nullable()->constrained('users')->onDelete('cascade');
//            $table->foreignId('rating_id')->after('details')->nullable()->constrained('ratings')->onUpdate('cascade');
//        });
    }

    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
