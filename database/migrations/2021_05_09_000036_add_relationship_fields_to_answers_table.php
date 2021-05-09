<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToAnswersTable extends Migration
{
    public function up()
    {
        Schema::table('answers', function (Blueprint $table) {
            $table->unsignedBigInteger('trivia_id');
            $table->foreign('trivia_id', 'trivia_fk_3764622')->references('id')->on('trivia');
            $table->unsignedBigInteger('event_id');
            $table->foreign('event_id', 'event_fk_3764623')->references('id')->on('events');
        });
    }
}
