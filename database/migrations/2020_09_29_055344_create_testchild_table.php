<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestchildTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('testchild', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('imgid')->unsigned();
            $table->string('imagename')->nullable();
            $table->foreign('imgid')->references('id')->on('testparent')->onDelete('cascade');
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
        Schema::dropIfExists('testchild');
    }
}
