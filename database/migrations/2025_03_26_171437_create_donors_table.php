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
        Schema::create('donors', function (Blueprint $table) {
            $table->id(); // Uses 'bigIncrements' as the default for primary key
            $table->string('name')->nullable();
            $table->string('address1')->nullable();
            $table->string('address2')->nullable();
            $table->string('city')->nullable();
            $table->string('district')->nullable();
            $table->string('country')->nullable();
            $table->string('state')->nullable();
            $table->string('pincode')->nullable(); // Ensure it's a string for leading zeros
            $table->string('phone1')->nullable(); // Phone numbers can be more than 10 digits
            $table->string('phone2')->nullable(); // Optional second phone number
            $table->date('dob')->nullable(); // Use date type for birthdate
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
     */
    public function down(): void
    {
        Schema::dropIfExists('donors');
    }
};
