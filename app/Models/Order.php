<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'order_number',
        'status',
        'subtotal',
        'tax',
        'shipping',
        'total',
        'billing_first_name',
        'billing_last_name',
        'billing_email',
        'billing_phone',
        'billing_address',
        'billing_city',
        'billing_state',
        'billing_country',
        'billing_zip',
        'shipping_first_name',
        'shipping_last_name',
        'shipping_address',
        'shipping_city',
        'shipping_state',
        'shipping_country',
        'shipping_zip',
        'notes',
        'payment_status',
        'payment_method',
        'payment_transaction_id',
        'shipped_at',
        'delivered_at',
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

    protected $casts = [
        'subtotal' => 'decimal:2',
        'tax' => 'decimal:2',
        'shipping' => 'decimal:2',
        'total' => 'decimal:2',
        'shipped_at' => 'datetime',
        'delivered_at' => 'datetime',
    ];

    protected static function boot()
    {
        parent::boot();
        
        static::creating(function ($order) {
            if (empty($order->order_number)) {
                $order->order_number = 'ORD-' . strtoupper(Str::random(8)) . '-' . now()->format('Ymd');
            }
        });
    }

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    // Helper methods
    public function getStatusBadgeAttribute()
    {
        $badges = [
            'pending' => 'bg-warning',
            'processing' => 'bg-info',
            'shipped' => 'bg-primary',
            'delivered' => 'bg-success',
            'cancelled' => 'bg-danger',
        ];

        return $badges[$this->status] ?? 'bg-secondary';
    }

    public function getBillingNameAttribute()
    {
        return trim($this->billing_first_name . ' ' . $this->billing_last_name);
    }

    public function getFullBillingNameAttribute()
    {
        return $this->billing_name;
    }

    public function getFullShippingNameAttribute()
    {
        return $this->shipping_first_name . ' ' . $this->shipping_last_name;
    }

    public function getBillingPhoneAttribute()
    {
        return $this->billing_phone ?? null;
    }

    public function getBillingPostalCodeAttribute()
    {
        return $this->billing_zip ?? null;
    }

    public function getTaxAmountAttribute()
    {
        return $this->tax ?? 0;
    }

    public function getShippingAmountAttribute()
    {
        return $this->shipping ?? 0;
    }

    public function getBillingAddressFullAttribute()
    {
        return $this->billing_address . ', ' . $this->billing_city . ', ' . $this->billing_state . ' ' . $this->billing_zip . ', ' . $this->billing_country;
    }

    public function getShippingAddressFullAttribute()
    {
        if (!$this->shipping_address) {
            return $this->billing_address_full;
        }
        return $this->shipping_address . ', ' . $this->shipping_city . ', ' . $this->shipping_state . ' ' . $this->shipping_zip . ', ' . $this->shipping_country;
    }

    // Scopes
    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    public function scopeProcessing($query)
    {
        return $query->where('status', 'processing');
    }

    public function scopeShipped($query)
    {
        return $query->where('status', 'shipped');
    }

    public function scopeDelivered($query)
    {
        return $query->where('status', 'delivered');
    }

    public function scopeCancelled($query)
    {
        return $query->where('status', 'cancelled');
    }
}
