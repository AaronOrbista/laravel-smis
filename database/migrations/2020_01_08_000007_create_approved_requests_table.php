<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApprovedRequestsTable extends Migration
{
    public function up()
    {
        Schema::create('approved_requests', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('quantity');

            $table->string('unit')->nullable();

            $table->float('price', 15, 2)->nullable();

            $table->date('date_requested');

            $table->string('control_number')->unique();

            $table->timestamps();

            $table->softDeletes();
        });
    }
}
