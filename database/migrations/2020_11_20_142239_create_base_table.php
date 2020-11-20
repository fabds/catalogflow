<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBaseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('base', function (Blueprint $table) {
            $table->id();
            $table->string('sku',100);
            $table->string('barcode',100)->nullable();
            $table->string('parent_sku',100)->nullable();
            $table->string('taglia',100)->nullable();
            $table->string('colore',100)->nullable();
            $table->string('key',100);
            $table->string('project',100);
            $table->dateTime('date_insert')->nullable();
            $table->index('key');
            $table->unique(['sku','key','project']);
            $table->foreign('key')->references('key')->on('jobs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('base');
    }
}
