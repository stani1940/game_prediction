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
            // ensure usernames behave like the Django model
            $table->string('username')->unique()->change();

            $table->boolean('active')->default(false)->after('being_notified');
            $table->boolean('staff')->default(false)->after('active');
            $table->boolean('admin')->default(false)->after('staff');
            $table->boolean('hide_email')->default(false)->after('admin');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['active', 'staff', 'admin', 'hide_email']);
            $table->dropUnique('users_username_unique');
            $table->string('username')->change();
        });
    }
};
