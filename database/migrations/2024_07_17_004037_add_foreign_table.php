<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Hanya tambahkan FK di tabel users, karena role_id & profile_id
        // belum ada di create_users_table.
        Schema::table('users', function (Blueprint $table) {
            $table->foreignId('profile_id')->nullable()->after('password')
                  ->constrained('profiles')->nullOnDelete();
            $table->foreignId('role_id')->nullable()->after('profile_id')
                  ->constrained('roles')->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['profile_id']);
            $table->dropForeign(['role_id']);
            $table->dropColumn(['profile_id', 'role_id']);
        });
    }
};