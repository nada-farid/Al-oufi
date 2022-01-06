<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('goods_release')->nullable();
            $table->date('invoice_date');
            $table->decimal('amount', 15, 2);
            $table->decimal('vat', 15, 2);
            $table->decimal('total', 15, 2);
            $table->longText('remarks');
            $table->string('status')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
