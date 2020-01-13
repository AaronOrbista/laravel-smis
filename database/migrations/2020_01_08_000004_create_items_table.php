<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name');

            $table->string('description');

            $table->integer('stock');

            $table->float('price', 15, 2)->nullable();

            $table->string('item_category');

            $table->timestamps();

            $table->softDeletes();
        });
    }
}
