<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'path',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Get the full URL for the image
     */
    public function getUrlAttribute()
    {
        // Since images exist in public/products/, use direct asset path
        $publicPath = public_path($this->path);
        if (file_exists($publicPath)) {
            return asset($this->path);
        }
        
        // Try storage directory with custom route
        $storagePath = storage_path('app/public/' . $this->path);
        if (file_exists($storagePath)) {
            try {
                return route('storage.local', $this->path);
            } catch (\Exception $e) {
                // If route fails, fallback to asset
                return asset($this->path);
            }
        }
        
        // Default placeholder if no image found
        return asset('img/malefashion-img/product-1.jpg');
    }

    /**
     * Check if image file exists
     */
    public function exists()
    {
        $storagePath = storage_path('app/public/' . $this->path);
        $publicPath = public_path($this->path);
        
        return file_exists($storagePath) || file_exists($publicPath);
    }
}
