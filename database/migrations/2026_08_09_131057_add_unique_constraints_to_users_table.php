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
        $duplicatePhones = DB::table('users')->select('phone')
            ->whereNotNull('phone')->where('phone', '!=', '')
            ->groupBy('phone')->havingRaw('COUNT(*) > 1')->pluck('phone');

        $duplicateEmails = DB::table('users')->select('email')
            ->whereNotNull('email')->where('email', '!=', '')
            ->groupBy('email')->havingRaw('COUNT(*) > 1')->pluck('email');

        if ($duplicatePhones->isNotEmpty() || $duplicateEmails->isNotEmpty()) {
            throw new \RuntimeException(
                'Cannot add unique constraints: duplicate users exist. '.
                'Duplicate phones: ['.$duplicatePhones->implode(', ').'] '.
                'Duplicate emails: ['.$duplicateEmails->implode(', ').']. '.
                'Resolve these records manually before re-running this migration.'
            );
        }

        Schema::table('users', function (Blueprint $table) {
            $table->unique('phone');
            $table->unique('email');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropUnique('users_phone_unique');
            $table->dropUnique('users_email_unique');
        });
    }
};
