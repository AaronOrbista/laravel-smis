<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemReleaseRecordsTable extends Migration
{
    public function up()
    {
        Schema::create('item_release_records', function (Blueprint $table) {
            $table->increments('id');

            $table->string('received_by');

            $table->boolean('claimed')->default(0);

            $table->timestamps();

            $table->softDeletes();
        });
    }
}
