<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string("filename");
            $table->string("project", 100);
            $table->string("type", 50);
            $table->string("environment", 50);
            $table->string("key", 100);
            $table->string("status", 50)->nullable();
            $table->text("log")->nullable();
            $table->text("notes")->nullable();
            $table->timestamps();
            $table->timestamp('processed_at')->nullable();
            $table->index("key");
            $table->unique(["filename","project","type","environment","key"]);
            $table->unique("key");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jobs');
    }
}
