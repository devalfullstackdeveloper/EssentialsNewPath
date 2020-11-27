<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableClientDataVersion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_data_version', function (Blueprint $table) {
            $table->increments('version_id');
            $table->string('client_main_id');
            $table->string('data_of');
            $table->string('client_id');
            $table->string('title');
            $table->string('name_first');
            $table->string('name_last');
            $table->string('name_middle');
            $table->string('address');
            $table->string('delivery_address');
            $table->string('dob');
            $table->string('mobile');
            $table->string('phone');
            $table->string('email');
            $table->string('crn');
            $table->string('driver_license');
            $table->string('passport');
            $table->string('medicare_card');
            $table->string('delivery_card_reference');
            $table->string('bsb');
            $table->string('account_number');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('client_data_version');
    }
}
