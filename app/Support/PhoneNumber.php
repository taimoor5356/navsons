<?php

namespace App\Support;

class PhoneNumber
{
    /**
     * Length of a national significant mobile number (e.g. Pakistani "3XXXXXXXXX").
     * The country calling code (phone_code) is stored separately, so any leading
     * trunk zero ("0300...") or country code ("+92300...", "92300...") is just
     * noise on top of these digits and gets trimmed away.
     */
    private const SIGNIFICANT_DIGITS = 10;

    /**
     * Reduce a phone number to a canonical form so that "03001234567",
     * "3001234567" and "+923001234567" are all recognized as the same number.
     */
    public static function normalize(?string $phone): ?string
    {
        if ($phone === null || trim($phone) === '') {
            return $phone;
        }

        $digits = preg_replace('/\D+/', '', $phone);

        if ($digits === '' || $digits === null) {
            return $phone;
        }

        return strlen($digits) > self::SIGNIFICANT_DIGITS
            ? substr($digits, -self::SIGNIFICANT_DIGITS)
            : $digits;
    }
}
