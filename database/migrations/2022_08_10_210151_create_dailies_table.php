<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dailies', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('jabatan');
            $table->string('status')->nullable();
            $table->string('image')->nullable();
            $table->dateTime('masuk')->nullable();
            $table->dateTime('keluar')->nullable();
            $table->string('absen_image')->nullable();
         
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
        Schema::dropIfExists('dailys');
    }
};
