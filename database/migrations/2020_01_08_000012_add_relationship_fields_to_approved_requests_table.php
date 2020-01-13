<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToApprovedRequestsTable extends Migration
{
    public function up()
    {
        Schema::table('approved_requests', function (Blueprint $table) {
            $table->unsignedInteger('requestor_id');

            $table->foreign('requestor_id', 'requestor_fk_826146')->references('id')->on('accounts');

            $table->unsignedInteger('item_id');

            $table->foreign('item_id', 'item_fk_826147')->references('id')->on('items');

            $table->unsignedInteger('description_id')->nullable();

            $table->foreign('description_id', 'description_fk_826148')->references('id')->on('items');

            $table->unsignedInteger('brand_id')->nullable();

            $table->foreign('brand_id', 'brand_fk_826149')->references('id')->on('brands');
        });
    }
}
