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
            $table->string('middle_name')->nullable();
            $table->string('last_name');
            $table->string('license_no');
            $table->foreignId('country_id')->constrained('countries');
            $table->foreignId('province_id')->constrained('provinces')->default(0);
            $table->foreignId('district_id')->constrained('districts')->default(0);
            $table->foreignId('municipality_id')->constrained('municipalities')->default(0);
            $table->foreignId('user_id')->constrained('users');
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
