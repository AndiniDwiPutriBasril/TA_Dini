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
        Schema::create('monitoring', function (Blueprint $table) {

            $table->id();

            $table->float('sudut_paha')->nullable();

            $table->float('sudut_betis')->nullable();

            $table->float('sudut_lutut')->nullable();

            $table->string('status_gerakan')->nullable();

            $table->integer('jumlah_squat')->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tabel_monitoring');
    }
};
