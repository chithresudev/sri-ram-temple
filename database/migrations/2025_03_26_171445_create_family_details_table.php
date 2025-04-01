<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('family_details', function (Blueprint $table) {
            $table->id(); // auto-incrementing big integer
            $table->unsignedBigInteger('donor_id'); // Make sure this is unsignedBigInteger
            $table->string('name')->nullable();
            $table->date('dob')->nullable(); // Store date properly
            $table->string('rasi')->nullable();
            $table->string('natchathiram')->nullable();
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('donor_id')->references('id')->on('donors')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('family_details');
    }
};
