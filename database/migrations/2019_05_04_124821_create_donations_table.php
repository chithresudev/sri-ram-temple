<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDonationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donations', function (Blueprint $table) {
          $table->increments('id');
          $table->unsignedInteger('donor_id')->nullable();
          $table->unsignedInteger('amount')->nullable();
          $table->string('donation_details')->nullable();
          $table->string('via')->nullable();
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
        Schema::dropIfExists('donations');
    }
}
