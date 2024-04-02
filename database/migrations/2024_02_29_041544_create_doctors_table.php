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
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('last_name');
            $table->string('license_no');
            $table->string('country');
            $table->string('province');
            $table->string('district');
            $table->string('municipality');
            $table->string('address');
            $table->string('ward_no');
            $table->string('gender');
            $table->string('date_of_bith_ad');
            $table->string('date_of_bith_bs');
            $table->string('image')->nullable();
            $table->foreignId('dept_id')->constrained('departments');
           
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctors');
    }
};
