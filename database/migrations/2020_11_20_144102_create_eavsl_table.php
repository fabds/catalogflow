<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEavslTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eavsl', function (Blueprint $table) {
            $table->id();
            $table->string('e',100);
            $table->string('a',100);
            $table->longText('v')->nullable();
            $table->string('s',20)->nullable();
            $table->string('l',20)->nullable();
            $table->string('key',100);
            $table->string('project',100);
            $table->string('filename',100);
            $table->dateTime('date_insert')->nullable();
            $table->index('key');
            $table->unique(['e','a','key','project']);
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
        Schema::dropIfExists('eavsl');
    }
}
