<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('user', function (Blueprint $table){
            $table->string('foto')->nullable(); // Menambahkan kolom 'foto' yang bersifat opsional
        });
    }

    public function down(): void
    {
        Schema::table('user', function (Blueprint $table){
            $table->dropColumn('foto')->nullable(); // Menghapus kolom 'f0to' jika rollback
        });
    }
};
