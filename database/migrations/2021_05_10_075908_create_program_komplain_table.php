<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgramKomplainTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('program_komplain', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_program')->unsigned()->nullable();
            $table->foreign('id_program')->references('id')->on('program')->onDelete('cascade')->onUpdate('cascade');
            $table->mediumText('complain');
            $table->mediumText('response');
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
        Schema::dropIfExists('program_komplain');
    }
}
