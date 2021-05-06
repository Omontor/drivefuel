<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToCheckoutsTable extends Migration
{
    public function up()
    {
        Schema::table('checkouts', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id', 'user_fk_3764473')->references('id')->on('users');
            $table->unsignedBigInteger('location_id');
            $table->foreign('location_id', 'location_fk_3764474')->references('id')->on('locations');
        });
    }
}
