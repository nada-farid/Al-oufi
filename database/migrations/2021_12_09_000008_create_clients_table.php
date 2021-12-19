<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('client_name');
            $table->string('tel_1');
            $table->string('tel_2')->nullable();
            $table->string('tax_number');
            $table->string('short_name');
            $table->string('email');
            $table->string('address');
            $table->string('fax')->nullable();
            $table->string('contact_person');
            $table->string('contact_person_2')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('home_tel')->nullable();
            $table->string('iban')->nullable();
            $table->string('mobile_number_1');
            $table->string('mobile_number_2')->nullable();
            $table->longText('remarks')->nullable();
            $table->date('from');
            $table->date('to');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
