<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_infos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->text('nip');
            $table->text('regon');
            $table->text('regon14');
            $table->text('name');
            $table->text('province');
            $table->text('district');
            $table->text('community');
            $table->text('city');
            $table->text('zipCode');
            $table->text('street');
            $table->text('province_2')->nullable();
            $table->text('district_2')->nullable();
            $table->text('community_2')->nullable();
            $table->text('city_2')->nullable();
            $table->text('zipCode_2')->nullable();
            $table->text('street_2')->nullable();
            $table->text('type');
            $table->text('silo');
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
        Schema::dropIfExists('user_infos');
    }
}
