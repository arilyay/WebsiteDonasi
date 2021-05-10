<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRelawanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('relawan', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_user')->unsigned()->nullable();
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->string('nama_depan');
            $table->string('nama_belakang');
            $table->string('alamat_ktp');
            $table->string('no_wa');
            $table->integer('id_provinsi')->unsigned()->nullable();
            $table->foreign('id_provinsi')->references('id')->on('provinsi')->onDelete('cascade');
            $table->integer('id_kabupaten')->unsigned()->nullable();
            $table->foreign('id_kabupaten')->references('id')->on('kabupaten')->onDelete('cascade');
            $table->integer('id_kecamatan')->unsigned()->nullable();
            $table->foreign('id_kecamatan')->references('id')->on('kecamatan')->onDelete('cascade');
            $table->integer('id_kelurahan')->unsigned()->nullable();
            $table->foreign('id_kelurahan')->references('id')->on('kelurahan')->onDelete('cascade');
            $table->integer('id_profesi')->unsigned()->nullable();
            $table->foreign('id_profesi')->references('id')->on('ref_profesi')->onDelete('cascade');
            $table->integer('id_jk')->unsigned()->nullable();
            $table->foreign('id_jk')->references('id')->on('ref_vendor_saving')->onDelete('cascade');
            $table->integer('id_agama')->unsigned()->nullable();
            $table->foreign('id_agama')->references('id')->on('ref_agama')->onDelete('cascade')->onUpdate('cascade');
            $table->rememberToken();
            $table->string('email');
            $table->boolean('is_verified')->default(0);
            $table->timestamp('inserted_at')->useCurrent();
            $table->string('inserted_by');
            $table->timestamp('edited_at')->default(DB::raw('NULL ON UPDATE CURRENT_TIMESTAMP'))->nullable();
            $table->string('edited_by');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('relawan');
    }
}
