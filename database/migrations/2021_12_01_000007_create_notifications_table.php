<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificationsTable extends Migration
{
    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('awb_no');
            $table->date('awb_date');
            $table->longText('remarks')->nullable();
            $table->string('appearance');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
