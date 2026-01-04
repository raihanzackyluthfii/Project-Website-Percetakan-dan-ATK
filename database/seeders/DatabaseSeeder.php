<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Create Admin User
        User::create([
            'name' => 'Admin',
            'email' => 'admin@percetakan.com',
            'password' => Hash::make('password123')
        ]);

        echo "✅ Admin user created!\n";
        echo "   Email: admin@percetakan.com\n";
        echo "   Password: password123\n\n";

        // Create Categories
        $categories = [
            [
                'name' => 'Alat Tulis',
                'description' => 'Berbagai macam alat tulis untuk kebutuhan sehari-hari'
            ],
            [
                'name' => 'Percetakan',
                'description' => 'Layanan percetakan berkualitas tinggi'
            ],
            [
                'name' => 'Perlengkapan Kantor',
                'description' => 'Perlengkapan kantor lengkap dan berkualitas'
            ],
        ];

        foreach ($categories as $categoryData) {
            $category = Category::create($categoryData);

            // Create products for each category
            if ($category->name === 'Alat Tulis') {
                Product::create([
                    'category_id' => $category->id,
                    'name' => 'Pulpen Pilot',
                    'description' => 'Pulpen Pilot hitam tinta gel berkualitas',
                    'price' => 5000,
                    'stock' => 100
                ]);

                Product::create([
                    'category_id' => $category->id,
                    'name' => 'Pensil 2B Faber Castell',
                    'description' => 'Pensil 2B untuk menulis dan menggambar',
                    'price' => 3000,
                    'stock' => 150
                ]);

                Product::create([
                    'category_id' => $category->id,
                    'name' => 'Penghapus Steadtler',
                    'description' => 'Penghapus putih premium',
                    'price' => 4000,
                    'stock' => 80
                ]);
            }

            if ($category->name === 'Percetakan') {
                Product::create([
                    'category_id' => $category->id,
                    'name' => 'Cetak Banner',
                    'description' => 'Banner ukuran 1x1 meter bahan flexi',
                    'price' => 50000,
                    'stock' => 50
                ]);

                Product::create([
                    'category_id' => $category->id,
                    'name' => 'Cetak Kartu Nama',
                    'description' => 'Kartu nama premium 100 pcs',
                    'price' => 75000,
                    'stock' => 30
                ]);

                Product::create([
                    'category_id' => $category->id,
                    'name' => 'Cetak Brosur A4',
                    'description' => 'Brosur A4 glossy 100 pcs',
                    'price' => 150000,
                    'stock' => 40
                ]);
            }

            if ($category->name === 'Perlengkapan Kantor') {
                Product::create([
                    'category_id' => $category->id,
                    'name' => 'Stapler Besar',
                    'description' => 'Stapler heavy duty untuk kertas tebal',
                    'price' => 45000,
                    'stock' => 25
                ]);

                Product::create([
                    'category_id' => $category->id,
                    'name' => 'Map Plastik',
                    'description' => 'Map plastik warna-warni isi 12 pcs',
                    'price' => 15000,
                    'stock' => 60
                ]);

                Product::create([
                    'category_id' => $category->id,
                    'name' => 'Gunting Kertas',
                    'description' => 'Gunting kertas tajam dan kuat',
                    'price' => 12000,
                    'stock' => 45
                ]);
            }
        }

        echo "✅ Categories and Products seeded successfully!\n";
    }
}