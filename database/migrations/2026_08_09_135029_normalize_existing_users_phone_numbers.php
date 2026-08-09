<?php

use App\Support\PhoneNumber;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $users = DB::table('users')->select('id', 'phone')->whereNotNull('phone')->where('phone', '!=', '')->get();

        $normalizedByUser = [];
        $usersByNormalized = [];

        foreach ($users as $user) {
            $normalized = PhoneNumber::normalize($user->phone);
            $normalizedByUser[$user->id] = $normalized;
            $usersByNormalized[$normalized][] = $user->id;
        }

        $collisions = array_filter($usersByNormalized, fn ($ids) => count($ids) > 1);

        if (! empty($collisions)) {
            $details = collect($collisions)->map(fn ($ids, $normalized) => $normalized.' <= users #'.implode(', #', $ids))->implode('; ');

            throw new \RuntimeException(
                'Cannot normalize phone numbers: multiple users would collide on the same normalized number. '.
                'Resolve these manually before re-running this migration: '.$details
            );
        }

        foreach ($normalizedByUser as $userId => $normalized) {
            if ($normalized !== null) {
                DB::table('users')->where('id', $userId)->update(['phone' => $normalized]);
            }
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Original raw phone formats are not recoverable once normalized.
    }
};
