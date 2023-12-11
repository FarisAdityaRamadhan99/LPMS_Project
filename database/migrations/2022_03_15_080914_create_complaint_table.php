<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComplaintTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('complaint', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user');
            $table->string('title_complaint')->nullable();
            $table->text('complaint')->nullable();
            $table->unsignedBigInteger('id_agency')->nullable();
            $table->unsignedBigInteger('id_category')->nullable();
            $table->unsignedBigInteger('id_region')->nullable();
            $table->string('location')->nullable();
            $table->string('longitude')->nullable();
            $table->string('latitude')->nullable();
            $table->string('image')->nullable();
            $table->enum('status', ['pending', 'ditinjau', 'diproses', 'selesai', 'ditolak'])->default('pending');
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
        Schema::dropIfExists('complaint');
    }
}
