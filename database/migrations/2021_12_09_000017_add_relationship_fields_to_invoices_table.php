<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToInvoicesTable extends Migration
{
    public function up()
    {
        Schema::table('invoices', function (Blueprint $table) {
            $table->unsignedBigInteger('awb_id');
            $table->foreign('awb_id', 'awb_fk_5466343')->references('id')->on('awbs');
            $table->unsignedBigInteger('client_id');
            $table->foreign('client_id', 'client_fk_5466346')->references('id')->on('clients');
        });
    }
}
