<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('calon_nasabahs', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('telepon');
            $table->date('tanggal_registrasi');
            $table->string('status')->default('Reguler');
            $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamps();

            $table->index('tanggal_registrasi');
            $table->index('status');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('calon_nasabahs');
    }
};
