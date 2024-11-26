<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLiveShowFeedsTable extends Migration
{
    public function up()
    {
        Schema::create('live_show_feeds', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('show_title');
            $table->string('status');
            $table->string('day');
            $table->time('start_time')->nullable();
            $table->time('end_time')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
