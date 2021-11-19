<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('office_id');
            $table->foreign('office_id')->references('id')->on('office')->onDelete('cascade')->onUpdate('cascade');
            $table->string('category');
            $table->string('name');
            $table->char('qty', 11);
            $table->string('location')->nullable();
            $table->year('years');
            $table->char('unit', 11);
            $table->string('condition');
            $table->text('description')->nullable();
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
        Schema::dropIfExists('assets');
    }
}
