<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToEventsTable extends Migration
{
    public function up()
    {
        Schema::table('events', function (Blueprint $table) {
            $table->unsignedBigInteger('route_id');
            $table->foreign('route_id', 'route_fk_3763944')->references('id')->on('routes');
            $table->unsignedBigInteger('location_id');
            $table->foreign('location_id', 'location_fk_3871342')->references('id')->on('locations');
        });
    }
}
