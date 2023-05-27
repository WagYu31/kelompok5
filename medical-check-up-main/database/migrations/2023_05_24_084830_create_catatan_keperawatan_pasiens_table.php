<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCatatanKeperawatanPasiensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('catatan_keperawatan_pasien', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('pasien_id');
            $table->string('tanggal_berobat');
            $table->text('resep_obat');
            $table->text('diagnosa_dokter');
            $table->text('catatan_dokter');
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
        Schema::dropIfExists('catatan_keperawatan_pasien');
    }
}
