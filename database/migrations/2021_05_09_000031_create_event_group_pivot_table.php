<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventGroupPivotTable extends Migration
{
    public function up()
    {
        Schema::create('event_group', function (Blueprint $table) {
            $table->unsignedBigInteger('event_id');
            $table->foreign('event_id', 'event_id_fk_3853186')->references('id')->on('events')->onDelete('cascade');
            $table->unsignedBigInteger('group_id');
            $table->foreign('group_id', 'group_id_fk_3853186')->references('id')->on('groups')->onDelete('cascade');
        });
    }
}
