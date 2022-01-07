<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableRabsAddAgendas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rabs', function (Blueprint $table) {
            $table->text('agenda');
            $table->date('date');
            $table->string('lokasi');
            $table->string('peserta');
            $table->string('anggaran');
            $table->text('keterangan');
            $table->dropColumn('type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('rabs', function (Blueprint $table) {
            //
        });
    }
}
