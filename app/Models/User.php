<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
// use PragmaRX\Google2FA\Google2FA;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'email_verified_at',
        // Profile Information
        'phone',
        'date_of_birth',
        'gender',
        // Address Information
        'address_line_1',
        'address_line_2',
        'city',
        'state',
        'postal_code',
        'country',
        // Additional Information
        'bio',
        'avatar',
        'email_notifications',
        'sms_notifications',
        // 2FA fields
        'two_factor_secret',
        'two_factor_recovery_codes',
        'two_factor_confirmed_at',
    ];

    /**
     * The attributes that should be guarded from mass assignment.
     *
     * @var list<string>
     */
    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_secret',
        'two_factor_recovery_codes',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'two_factor_recovery_codes' => 'array',
            'two_factor_confirmed_at' => 'datetime',
        ];
    }

    // Relationships
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    // Accessor for full address
    public function getFullAddressAttribute()
    {
        $address = [];
        
        if ($this->address_line_1) {
            $address[] = $this->address_line_1;
        }
        
        if ($this->address_line_2) {
            $address[] = $this->address_line_2;
        }
        
        if ($this->city) {
            $address[] = $this->city;
        }
        
        if ($this->state) {
            $address[] = $this->state;
        }
        
        if ($this->postal_code) {
            $address[] = $this->postal_code;
        }
        
        if ($this->country) {
            $address[] = $this->country;
        }
        
        return implode(', ', $address);
    }

    // Accessor for formatted phone number
    public function getFormattedPhoneAttribute()
    {
        if (!$this->phone) {
            return null;
        }
        
        // Simple phone formatting (you can enhance this)
        $phone = preg_replace('/[^0-9]/', '', $this->phone);
        
        if (strlen($phone) === 10) {
            return '(' . substr($phone, 0, 3) . ') ' . substr($phone, 3, 3) . '-' . substr($phone, 6, 4);
        }
        
        return $this->phone;
    }

    // Check if user has complete profile
    public function hasCompleteProfile()
    {
        return !empty($this->phone) && 
               !empty($this->address_line_1) && 
               !empty($this->city) && 
               !empty($this->state) && 
               !empty($this->postal_code);
    }

    // 2FA Methods
    public function hasTwoFactorEnabled()
    {
        return !is_null($this->two_factor_secret) && !is_null($this->two_factor_confirmed_at);
    }

    public function generateTwoFactorSecret()
    {
        $service = new \App\Services\TwoFactorService();
        return $service->generateSecretKey();
    }

    public function getTwoFactorQrCodeUrl()
    {
        $service = new \App\Services\TwoFactorService();
        return $service->getQRCodeUrl(
            $this->two_factor_secret,
            $this->email,
            config('app.name')
        );
    }

    public function verifyTwoFactorCode($code)
    {
        $service = new \App\Services\TwoFactorService();
        return $service->verifyCode($this->two_factor_secret, $code);
    }

    public function generateRecoveryCodes()
    {
        $service = new \App\Services\TwoFactorService();
        return $service->generateRecoveryCodes();
    }

    public function useRecoveryCode($code)
    {
        $codes = $this->two_factor_recovery_codes ?? [];
        $key = array_search($code, $codes);
        
        if ($key !== false) {
            unset($codes[$key]);
            $this->update(['two_factor_recovery_codes' => array_values($codes)]);
            return true;
        }
        
        return false;
    }

    public function enableTwoFactor($secret, $code)
    {
        $service = new \App\Services\TwoFactorService();
        
        if ($service->verifyCode($secret, $code)) {
            $this->update([
                'two_factor_secret' => $secret,
                'two_factor_recovery_codes' => $this->generateRecoveryCodes(),
                'two_factor_confirmed_at' => now(),
            ]);
            return true;
        }
        
        return false;
    }

    public function disableTwoFactor()
    {
        $this->update([
            'two_factor_secret' => null,
            'two_factor_recovery_codes' => null,
            'two_factor_confirmed_at' => null,
        ]);
    }

    /**
     * Get the user's wishlist items.
     */
    public function wishlists()
    {
        return $this->hasMany(Wishlist::class);
    }

    /**
     * Get the products in the user's wishlist.
     */
    public function wishlistProducts()
    {
        return $this->belongsToMany(Product::class, 'wishlists')->withTimestamps();
    }

    /**
     * Check if a product is in the user's wishlist.
     */
    public function hasInWishlist($productId)
    {
        return $this->wishlists()->where('product_id', $productId)->exists();
    }
}
