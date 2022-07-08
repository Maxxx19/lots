<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLotCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lot_category', function (Blueprint $table) {

            $table->unsignedBigInteger('lot_id')->unsigned();

            $table->unsignedBigInteger('category_id')->unsigned();

            $table->foreign('lot_id')->references('id')->on('lots')

                ->onDelete('cascade');

            $table->foreign('category_id')->references('id')->on('categories')

                ->onDelete('cascade');
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lot_category');
    }
}
