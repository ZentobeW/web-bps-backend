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
        Schema::table('publikasis', function (Blueprint $table) {
            $table->dropColumn(['nomor', 'judul', 'tanggal_rilis']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('publikasis', function (Blueprint $table) {
            $table->string('nomor')->nullable()->after('id');
            $table->string('judul')->nullable()->after('nomor');
            $table->date('tanggal_rilis')->nullable()->after('judul');
        });
    }
};
