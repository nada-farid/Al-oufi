<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAwbsTable extends Migration
{
    public function up()
    {
        Schema::create('awbs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('awb_no');
            $table->integer('no_of_pcs');
            $table->string('goods_type');
            $table->integer('decleration_no');
            $table->float('goods_weight', 15, 2);
            $table->date('declaration_date');
            $table->integer('delivery_no');
            $table->date('delivery_date');
            $table->integer('delivery_amount');
            $table->date('goods_date')->nullable();
            $table->integer('customer_fees');
            $table->integer('receipt_no')->nullable();
            $table->date('receipt_date')->nullable();
            $table->longText('remarks')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->unsignedBigInteger('notification_id');
            $table->foreign('notification_id', 'notification_fk_5466358')->references('id')->on('notifications');
        });
    }
}
