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
        if (Schema::hasTable('event_user')) {
            Schema::rename('event_user', 'predictions');
        }

        Schema::table('predictions', function (Blueprint $table) {
            if (Schema::hasColumn('predictions', 'event_id')) {
                $table->renameColumn('event_id', 'game_id');
            }
        });

        Schema::table('predictions', function (Blueprint $table) {
            if (Schema::hasColumn('predictions', 'is_available')) {
                $table->renameColumn('is_available', 'is_open');
            }
        });

        Schema::table('predictions', function (Blueprint $table) {
            $table->smallInteger('points')->default(0)->after('away_prediction');
            $table->boolean('is_open')->default(true)->change();
            $table->dateTime('prediction_time')->useCurrent()->change();

            if (Schema::hasColumn('predictions', 'is_boosted')) {
                $table->dropColumn('is_boosted');
            }

            $table->unique(['user_id', 'game_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('predictions', function (Blueprint $table) {
            $table->dropUnique('predictions_user_id_game_id_unique');
            $table->dropColumn('points');
            $table->boolean('is_open')->default(true)->change();
            $table->dateTime('prediction_time')->change();
            $table->boolean('is_boosted')->default(false)->after('prediction_time');
        });

        Schema::table('predictions', function (Blueprint $table) {
            $table->renameColumn('is_open', 'is_available');
            $table->renameColumn('game_id', 'event_id');
        });

        if (Schema::hasTable('predictions')) {
            Schema::rename('predictions', 'event_user');
        }
    }
};
