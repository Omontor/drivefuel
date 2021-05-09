<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToWitnesspostsTable extends Migration
{
    public function up()
    {
        Schema::table('witnessposts', function (Blueprint $table) {
            $table->unsignedBigInteger('witness_id');
            $table->foreign('witness_id', 'witness_fk_3764727')->references('id')->on('witnesses');
            $table->unsignedBigInteger('event_id');
            $table->foreign('event_id', 'event_fk_3764728')->references('id')->on('events');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id', 'user_fk_3782225')->references('id')->on('users');
        });
    }
}
