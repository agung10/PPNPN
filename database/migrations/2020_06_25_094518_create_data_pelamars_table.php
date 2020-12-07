<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataPelamarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_pelamars', function (Blueprint $table) {
            $table->id();
            $table->string('no_ktp', 50)->unique();
            $table->string('nama', 50);
            $table->string('tmpt_lahir', 50);
            $table->string('tgl_lahir', 25);
            $table->string('no_ijazah');
            $table->string('nm_sekolah');
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
            $table->enum('jenjang', ['SMA/SLTA sederajat', 'D3', 'D4/S1', 'S2']);
            $table->string('fakultas');
            $table->string('jurusan');
            $table->double('ipk', 25);

            $table->bigInteger('jabatan_id')->unsigned();
            $table->String('registrationId');
            $table->String('nomor_ujian', 25)->nullable();

            /*UPLOAD*/
            $table->string('foto')->nullable();

            $table->string('ktp')->nullable();
            $table->enum('s_ktp', ['Disetujui', 'Belum Disetujui']);

            $table->string('ijazah')->nullable();
            $table->enum('s_ijazah', ['Disetujui', 'Belum Disetujui']);

            $table->string('transkrip')->nullable();
            $table->enum('s_transkrip', ['Disetujui', 'Belum Disetujui']);

            $table->string('srt_lamaran')->nullable();
            $table->enum('s_srt_lamaran', ['Disetujui', 'Belum Disetujui']);

            $table->string('lembar_isian')->nullable();
            $table->enum('s_lembar_isian', ['Disetujui', 'Belum Disetujui']);
            
            $table->timestamps();

            $table->foreign('jabatan_id')->references('id')->on('jabatans')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data_pelamars');
    }
}
