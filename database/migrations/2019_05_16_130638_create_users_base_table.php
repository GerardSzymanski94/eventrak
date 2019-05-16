<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersBaseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_base', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('id_abc');
            $table->text('id_abc_sklep');
            $table->text('nip');
            $table->text('nazwa');
            $table->text('kontakt');
            $table->text('kod_pocztowy');
            $table->text('miejscowosc');
            $table->text('ulica');
            $table->text('firma_nazwa');
            $table->text('firma_kontakt');
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
        Schema::dropIfExists('users_base');
    }
}
