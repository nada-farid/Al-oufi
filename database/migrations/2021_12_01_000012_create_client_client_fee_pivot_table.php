<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientClientFeePivotTable extends Migration
{
    public function up()
    {
        Schema::create('client_client_fee', function (Blueprint $table) {
            $table->unsignedBigInteger('client_id');
            $table->foreign('client_id', 'client_id_fk_5466773')->references('id')->on('clients')->onDelete('cascade');
            $table->unsignedBigInteger('client_fee_id');
            $table->foreign('client_fee_id', 'client_fee_id_fk_5466773')->references('id')->on('client_fees')->onDelete('cascade');
            $table->decimal('clearance_fee', 15, 2);
            $table->decimal('transportaion', 15, 2);
            $table->decimal('loading_fee', 15, 2);
        });
    }
}
