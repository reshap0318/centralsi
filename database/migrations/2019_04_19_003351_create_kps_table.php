<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kp_proposal', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('judul');
            $table->unsignedBigInteger('instansi_id');
            $table->text('latar_belakang');
            $table->text('tujuan');
            $table->date('usulan_mulai_at');
            $table->date('usulan_selesai_at');
            $table->integer('status_proposal')->nullable();
            $table->text('catatan')->nullable();
            $table->timestamps();

            $table->foreign('instansi_id')->references('id')->on('kp_instansi');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kp_proposal');
    }
}
