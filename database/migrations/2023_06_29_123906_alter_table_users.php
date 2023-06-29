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
        Schema::table('users', function (Blueprint $table) {
            $table->after('id', function($table) {
                $table->string('login')->unique();
            });
            $table->after('name', function($table) {
                $table->string('last_name');
                $table->timestamp('birthday')->nullable();
            });
            $table->dropColumn('email');
            $table->dropColumn('email_verified_at');
            $table->tinyInteger('is_admin')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->dropColumn('login');
            $table->dropColumn('last_name');
            $table->dropColumn('birthday');
            $table->dropColumn('is_admin');
        });
    }
};
