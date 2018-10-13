<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDosensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dosens', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('nip');
            $table->string('nama');
            $table->date('tanggalLahir');
            $table->integer('agama_id')->unsigned()->index();
            $table->string('email')->unique();
            $table->string('rfid')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('agama_id')
                ->references('id')
                ->on('agama')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('dosens');
    }
}
