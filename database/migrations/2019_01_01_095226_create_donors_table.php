<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDonorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('phone')->nullable();
            $table->string('doorno')->nullable();
            $table->string('address1')->nullable();
            $table->string('address2')->nullable();
            $table->string('district');
            $table->string('state');
            $table->integer('pincode');
            $table->string('dob')->nullable();
            $table->string('rasi')->nullable();
            $table->string('natchathiram')->nullable();
            $table->enum('type', [
              'monthly',
              'festival',
              'laksha',
              'others'
            ]);

            $table->string('others_detail')->nullable();
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
        Schema::dropIfExists('donors');
    }
}
