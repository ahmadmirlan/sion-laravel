<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKelasMahasiswaRelationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kelas_mahasiswa_relation', function (Blueprint $table) {
            $table->integer('id_kelas')->unsigned()->index();
            $table->integer('id_mahasiswa')->unsigned()->index();
            $table->string('kode_rfid');
            $table->string('P1')->nullable();
            $table->string('P2')->nullable();
            $table->string('P3')->nullable();
            $table->string('P4')->nullable();
            $table->string('P5')->nullable();
            $table->string('P6')->nullable();
            $table->string('P7')->nullable();
            $table->string('P8')->nullable();
            $table->string('P9')->nullable();
            $table->string('P10')->nullable();
            $table->string('P11')->nullable();
            $table->string('P12')->nullable();
            $table->string('P13')->nullable();
            $table->string('P14')->nullable();
            $table->timestamps();

            $table->primary(['id_kelas','id_mahasiswa']);

            $table->foreign('id_kelas')
                ->references('id')
                ->on('kelas')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('id_mahasiswa')
                ->references('id')
                ->on('mahasiswas')
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
        Schema::dropIfExists('kelas_mahasiswa_relation');
    }
}
