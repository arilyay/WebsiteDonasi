<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgramDonaturTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('program_donatur', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_program')->unsigned()->nullable();
            $table->foreign('id_program')->references('id')->on('program')->onDelete('cascade');
            $table->integer('nominal_donasi');
            $table->integer('id_rekening')->unsigned()->nullable();
            $table->foreign('id_rekening')->references('id')->on('rekening')->onDelete('cascade');
            $table->string('nama_pengirim');
            $table->string('nomor_rekening_pengirim');
            $table->string('atas_nama');
            $table->string('email');
            $table->text('pesan');
            $table->boolean('status_verifikasi')->default(0);
            $table->boolean('status_donasi')->default(0);
            $table->timestamp('inserted_at')->useCurrent();
            $table->string('inserted_by');
            $table->timestamp('edited_at')->default(DB::raw('NULL ON UPDATE CURRENT_TIMESTAMP'))->nullable();
            $table->string('edited_by');
            $table->timestamp('verified_at')->default(DB::raw('NULL ON UPDATE CURRENT_TIMESTAMP'))->nullable();
            $table->string('verified_by');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('program_donatur');
    }
}
