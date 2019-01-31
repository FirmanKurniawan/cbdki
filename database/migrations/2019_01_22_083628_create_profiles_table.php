<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama')->nullable();
            $table->text('alamat')->nullable();
            $table->string('telepon')->nullable();
            $table->string('email')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('instagram')->nullable();
            $table->string('linkyt')->nullable();
            $table->text('pengantar1')->nullable();
            $table->text('pengantar2')->nullable();
            $table->text('pengantar3')->nullable();
            $table->string('gambar_depan')->nullable();
            $table->string('gambar_about')->nullable();
            $table->string('gambar_bawah')->nullable();
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
        Schema::dropIfExists('profiles');
    }
}
