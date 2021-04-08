<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMuallafTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('muallaf', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama');
            $table->string('ktp');
            $table->string('jk');
            $table->string('lahir');
            $table->date('tgl');
            $table->string('pekerjaan');
            $table->string('agama');
            $table->string('kebangsaan');
            $table->string('email');
            $table->string('telp');
            $table->blob('foto');
            $table->text('alamat');
            $table->text('domisili');
            $table->text('pernyataan1');
            $table->text('pernyataan2');
            $table->text('pernyataan3');
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
        Schema::dropIfExists('muallaf');
    }
}
