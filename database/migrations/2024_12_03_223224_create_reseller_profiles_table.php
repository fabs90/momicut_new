<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('reseller_profiles', function (Blueprint $table) {
            $table->id();
            $table->string('nama')->index();
            $table->string('alamat')->nullable();
            $table->string('nomor_hp', 18)->unique();
            $table->string('keterangan')->nullable()->default('No notes provided');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reseller_profiles');
    }
};
