<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSnattProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('snatt_products', function (Blueprint $table) {
            $table->id();
            $table->string('sku')->nullable();
            $table->string('brand')->nullable();
            $table->string('style')->nullable();
            $table->string('colore')->nullable();
            $table->string('taglia')->nullable();
            $table->string('descrizione')->nullable();
            $table->string('barcode')->nullable();
            $table->string('custom_code')->nullable();
            $table->string('country_of_origin')->nullable();
            $table->string('foto')->nullable();
            $table->string('appeso')->nullable();
            $table->string('classe_pericolo')->nullable();
            $table->string('gruppo_imballaggio')->nullable();
            $table->string('personalizzabile')->nullable();
            $table->string('file_prefix')->nullable();
            $table->string('key',100);
            $table->string('project',100);
            $table->string('filename',100);
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
        Schema::dropIfExists('snatt_products');
    }
}
