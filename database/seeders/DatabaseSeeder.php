<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $sampleImages = [
            'product-1.jpg',
            'product-2.jpg',
            'product-3.jpg',
            'product-4.jpg',
            'product-5.jpg',
            'product-6.jpg',
            'product-7.jpg',
            'product-8.jpg',
            'product-9.jpg',
            'product-10.jpg',
        ];

        for ($i = 1; $i <= 20; $i++) {
            $productId = \DB::table('products')->insertGetId([
                'name' => "Test Product $i",
                'description' => "This is test product number $i.",
                'price' => 10.99 + $i,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // Ensure the directory exists and copy a sample image
            $imageDir = storage_path('app/public/products');
            if (!is_dir($imageDir)) {
                mkdir($imageDir, 0777, true);
            }
            $imgIdx = ($i - 1) % count($sampleImages);
            $sampleImage = public_path('img/malefashion-img/' . $sampleImages[$imgIdx]);
            $storageImage = $imageDir . '/' . $sampleImages[$imgIdx];
            if (file_exists($sampleImage) && !file_exists($storageImage)) {
                copy($sampleImage, $storageImage);
            }

            // Add image record
            \DB::table('images')->insert([
                'product_id' => $productId,
                'path' => 'products/' . $sampleImages[$imgIdx],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
