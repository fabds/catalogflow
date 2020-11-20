<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNetsuiteProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('netsuite_products', function (Blueprint $table) {
            $table->id();
            $table->string('matrix_type')->nullable();
            $table->string('brand')->nullable();
            $table->string('barcode')->nullable();
            $table->string('sku')->nullable();
            $table->string('external_id')->nullable();
            $table->string('parent_sku')->nullable();
            $table->string('cod_colore')->nullable();
            $table->string('taglia')->nullable();
            $table->string('descrizione_fattura')->nullable();
            $table->string('categoria_merceologica')->nullable();
            $table->string('composition')->nullable();
            $table->string('made_in')->nullable();
            $table->string('country_of_origin')->nullable();
            $table->string('nome_comune')->nullable();
            $table->string('composizione_sku')->nullable();
            $table->string('specie_animale')->nullable();
            $table->string('cites',10)->nullable();
            $table->string('peso',10)->nullable();
            $table->string('commodity_code')->nullable();
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
        Schema::dropIfExists('netsuite_products');
    }
}
