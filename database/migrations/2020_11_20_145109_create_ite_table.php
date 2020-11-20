<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ite', function (Blueprint $table) {
            $table->id();
            $table->string('codice_articolo',100);
            $table->string('codice_articolo_del_fornitore',100)->nullable();
            $table->string('nome_articolo');
            $table->string('codice_configurabile',100)->nullable();
            $table->string('configurable_attributes',100)->nullable();
            $table->string('configurable_values',100)->nullable();
            $table->string('taxvat_code',20)->nullable();
            $table->string('visibility',10)->nullable();
            $table->string('attribute_set',20)->nullable();
            $table->string('key',100);
            $table->string('project',100);
            $table->string('filename',100);
            $table->dateTime('date_insert')->nullable();
            $table->index('key');
            $table->unique(['codice_articolo','key','project']);
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
        Schema::dropIfExists('ite');
    }
}
