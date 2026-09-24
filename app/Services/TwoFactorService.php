<?php

namespace App\Services;

class TwoFactorService
{
    /**
     * Generate a random secret key for 2FA
     */
    public function generateSecretKey(): string
    {
        // Generate 20 random bytes
        $randomBytes = random_bytes(20);
        
        // Convert to Base32
        return $this->base32Encode($randomBytes);
    }

    /**
     * Generate QR code URL for authenticator apps
     */
    public function getQRCodeUrl(string $secret, string $email, string $issuer = 'Admin Panel'): string
    {
        // Secret is already Base32 encoded, so use it directly
        $encodedIssuer = urlencode($issuer);
        $encodedEmail = urlencode($email);
        
        return "otpauth://totp/{$encodedIssuer}:{$encodedEmail}?secret={$secret}&issuer={$encodedIssuer}";
    }

    /**
     * Verify a TOTP code
     */
    public function verifyCode(string $secret, string $code, int $window = 1): bool
    {
        $timeSlice = floor(time() / 30);
        
        for ($i = -$window; $i <= $window; $i++) {
            $calculatedCode = $this->calculateCode($secret, $timeSlice + $i);
            if (hash_equals($calculatedCode, $code)) {
                return true;
            }
        }
        
        return false;
    }

    /**
     * Calculate TOTP code for a given time slice
     */
    private function calculateCode(string $secret, int $timeSlice): string
    {
        $key = $this->base32Decode($secret);
        $time = pack('N*', 0) . pack('N*', $timeSlice);
        $hm = hash_hmac('sha1', $time, $key, true);
        $offset = ord($hm[19]) & 0xf;
        $code = (
            ((ord($hm[$offset + 0]) & 0x7f) << 24) |
            ((ord($hm[$offset + 1]) & 0xff) << 16) |
            ((ord($hm[$offset + 2]) & 0xff) << 8) |
            (ord($hm[$offset + 3]) & 0xff)
        ) % 1000000;
        
        return str_pad($code, 6, '0', STR_PAD_LEFT);
    }

    /**
     * Base32 encode
     */
    private function base32Encode(string $data): string
    {
        $alphabet = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ234567';
        $output = '';
        $v = 0;
        $vbits = 0;
        
        for ($i = 0, $j = strlen($data); $i < $j; $i++) {
            $v <<= 8;
            $v += ord($data[$i]);
            $vbits += 8;
            
            while ($vbits >= 5) {
                $vbits -= 5;
                $output .= $alphabet[$v >> $vbits];
                $v &= ((1 << $vbits) - 1);
            }
        }
        
        if ($vbits > 0) {
            $v <<= (5 - $vbits);
            $output .= $alphabet[$v];
        }
        
        return $output;
    }

    /**
     * Base32 decode
     */
    private function base32Decode(string $data): string
    {
        $alphabet = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ234567';
        $output = '';
        $v = 0;
        $vbits = 0;
        
        for ($i = 0, $j = strlen($data); $i < $j; $i++) {
            $pos = strpos($alphabet, strtoupper($data[$i]));
            if ($pos === false) {
                continue; // Skip invalid characters
            }
            
            $v <<= 5;
            $v += $pos;
            $vbits += 5;
            
            if ($vbits >= 8) {
                $vbits -= 8;
                $output .= chr($v >> $vbits);
                $v &= ((1 << $vbits) - 1);
            }
        }
        
        return $output;
    }

    /**
     * Generate recovery codes
     */
    public function generateRecoveryCodes(int $count = 8): array
    {
        $codes = [];
        for ($i = 0; $i < $count; $i++) {
            $codes[] = strtoupper(substr(md5(uniqid() . random_bytes(16)), 0, 8));
        }
        return $codes;
    }

    /**
     * Debug method to test code generation
     */
    public function debugCode(string $secret): array
    {
        $timeSlice = floor(time() / 30);
        $currentCode = $this->calculateCode($secret, $timeSlice);
        $previousCode = $this->calculateCode($secret, $timeSlice - 1);
        $nextCode = $this->calculateCode($secret, $timeSlice + 1);
        
        return [
            'secret' => $secret,
            'time_slice' => $timeSlice,
            'current_time' => time(),
            'current_code' => $currentCode,
            'previous_code' => $previousCode,
            'next_code' => $nextCode,
            'decoded_secret' => bin2hex($this->base32Decode($secret)),
            'secret_length' => strlen($secret),
            'time_remaining' => 30 - (time() % 30)
        ];
    }

    /**
     * Test with a known secret to verify implementation
     */
    public function testWithKnownSecret(): array
    {
        // This is a known test secret: "JBSWY3DPEHPK3PXP"
        $testSecret = "JBSWY3DPEHPK3PXP";
        $timeSlice = floor(time() / 30);
        
        return [
            'test_secret' => $testSecret,
            'time_slice' => $timeSlice,
            'expected_code' => $this->calculateCode($testSecret, $timeSlice),
            'verification_test' => $this->verifyCode($testSecret, $this->calculateCode($testSecret, $timeSlice))
        ];
    }
}