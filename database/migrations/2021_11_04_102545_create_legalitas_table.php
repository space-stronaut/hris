<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLegalitasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('legalitas', function (Blueprint $table) {
            $table->id();
            $table->string('company');
            $table->unsignedBigInteger('office_id');
            $table->foreign('office_id')->references('id')->on('office')->onDelete('cascade')->onUpdate('cascade');
            $table->string('name');
            $table->string('no_contact');
            $table->date('start_contract')->nullable();
            $table->date('end_contract')->nullable();
            $table->text('notes');
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
        Schema::dropIfExists('legalitas');
    }
}
