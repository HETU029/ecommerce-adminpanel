<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('image');
            $table->string('price');
            $table->string('slug', 191)->nullable();
            $table->dateTime('publish_datetime');
            $table->text('content');
            $table->string('meta_title', 191)->nullable();
            $table->text('meta_description', 65535)->nullable();
            $table->enum('status', ['Published', 'Draft', 'InActive', 'Scheduled']);
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
        Schema::dropIfExists('products');
    }
}
