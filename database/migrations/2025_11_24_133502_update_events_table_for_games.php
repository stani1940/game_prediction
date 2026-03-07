<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (! Schema::hasColumn('events', 'uid')) {
            Schema::table('events', function (Blueprint $table) {
                $table->unsignedSmallInteger('uid')->nullable()->after('id');
            });
        }

        if (! Schema::hasColumn('events', 'title')) {
            Schema::table('events', function (Blueprint $table) {
                $table->string('title', 111)->nullable()->after('uid');
            });
        }

        // backfill unique identifiers for any existing records
        $counter = 1;
        DB::table('events')
            ->orderBy('id')
            ->select('id')
            ->get()
            ->each(function ($event) use (&$counter) {
                DB::table('events')
                    ->where('id', $event->id)
                    ->update(['uid' => $counter++]);
            });

        if (! Schema::hasColumn('events', 'uid')) {
            return;
        }

        Schema::table('events', function (Blueprint $table) {
            $table->unique('uid', 'events_uid_unique');
        });

        Schema::table('events', function (Blueprint $table) {
            $table->string('state', 21)->default('Not started')->change();
        });

        Schema::table('events', function (Blueprint $table) {
            if (Schema::hasColumn('events', 'category')) {
                $table->dropColumn('category');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasColumn('events', 'uid')) {
            Schema::table('events', function (Blueprint $table) {
                $table->dropUnique('events_uid_unique');
            });

            Schema::table('events', function (Blueprint $table) {
                $table->dropColumn('uid');
            });
        }

        Schema::table('events', function (Blueprint $table) {
            $table->dropColumn('title');
            $table->enum('category', [
                'Qualification',
                'Group Round',
                'Round of sixteen',
                'Quarterfinal',
                'Semifinal',
                'Final',
            ])->after('state');
        });

        Schema::table('events', function (Blueprint $table) {
            $table->enum('state', ['Scheduled', 'In Progress', 'Finished'])
                ->default('Scheduled')
                ->change();
        });
    }
};
