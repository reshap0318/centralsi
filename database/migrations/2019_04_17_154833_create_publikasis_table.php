<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePublikasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('publikasi', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('judul');
            $table->integer('tahun');
            $table->string('nama_publikasi');
            $table->integer('jenis_publikasi'); //seminar, jurnal
            $table->string('publisher')->nullable();
            $table->integer('total_dana')->default(0);
            $table->string('url')->nullable();
            $table->string('file_artikel')->nullable();
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
        Schema::dropIfExists('publikasi');
    }
}
