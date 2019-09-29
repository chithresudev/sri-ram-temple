<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFamilyDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('family_details', function (Blueprint $table) {
      $table->increments('id');
      $table->unsignedInteger('donor_id')->nullable();
      $table->string('name')->nullable();
      $table->string('dob')->nullable();
      $table->string('rasi')->nullable();
      $table->string('natchathiram')->nullable();
      $table->timestamps();

      $table->foreign('donor_id')->references('id')->on('donors')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('family_details');
    }
}
