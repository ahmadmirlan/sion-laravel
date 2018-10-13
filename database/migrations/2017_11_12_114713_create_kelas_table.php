<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKelasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kelas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_dosen')->unsigned()->index();
            $table->integer('id_matakuliah')->unsigned()->index();
            $table->integer('id_ruangan')->unsigned()->index();
            $table->time('jamKuliah');
            $table->time('jamSelesaiKuliah');
            $table->enum('hariPerkuliahan', ['Monday', 'Tuesday', 'Wednesday', 'Thursday',
                'Friday', 'Saturday', 'Sunday']);
            $table->timestamps();

            $table->foreign('id_dosen')
                ->references('id')
                ->on('dosens')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('id_matakuliah')
                ->references('id')
                ->on('matakuliah')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('id_ruangan')
                ->references('id')
                ->on('ruangan')
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
        Schema::dropIfExists('kelas');
    }
}
