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
            $table->string('username');
            $table->string('avatar')->nullable(true);
            $table->smallInteger('boosts_left');
            $table->boolean('being_notified');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->removeColumn('username');
            $table->removeColumn('avatar');
            $table->removeColumn('boosts_left');
            $table->removeColumn('being_notified');
        });
    }
};
