<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToTriviaTable extends Migration
{
    public function up()
    {
        Schema::table('trivia', function (Blueprint $table) {
            $table->unsignedBigInteger('questionarie_id');
            $table->foreign('questionarie_id', 'questionarie_fk_3764610')->references('id')->on('questionaries');
        });
    }
}
