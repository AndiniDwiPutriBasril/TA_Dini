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
        Schema::create('realtime_data', function (Blueprint $table) {

            $table->id();

            $table->double('sudut_paha')->default(0);

            $table->double('sudut_betis')->default(0);

            $table->double('sudut_lutut')->default(0);

            $table->string('status')->default('Berdiri');

            $table->timestamps();
        });
        }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('realtime_data');
    }
};
