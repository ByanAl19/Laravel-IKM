<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create roles
        $adminRole = Role::create([
            'name' => 'admin',
            'description' => 'Administrator dengan akses penuh',
        ]);

        $userRole = Role::create([
            'name' => 'user',
            'description' => 'User biasa dengan akses terbatas',
        ]);

        // Create admin user
        User::create([
            'name' => 'Administrator',
            'email' => 'admin@automotive.com',
            'password' => Hash::make('admin123'),
            'role_id' => $adminRole->id,
        ]);

        // Create regular user
        User::create([
            'name' => 'User Test',
            'email' => 'user@automotive.com',
            'password' => Hash::make('user123'),
            'role_id' => $userRole->id,
        ]);

        // Create sample categories
        Category::create([
            'name' => 'Suku Cadang Rem',
            'description' => 'Kategori untuk suku cadang sistem rem',
        ]);

        Category::create([
            'name' => 'Suku Cadang Mesin',
            'description' => 'Kategori untuk suku cadang mesin kendaraan',
        ]);

        Category::create([
            'name' => 'Oli & Pelumas',
            'description' => 'Kategori untuk oli dan pelumas kendaraan',
        ]);

        Category::create([
            'name' => 'Ban & Velg',
            'description' => 'Kategori untuk ban dan velg kendaraan',
        ]);

        Category::create([
            'name' => 'Aksesoris',
            'description' => 'Kategori untuk aksesoris kendaraan',
        ]);

        // Create sample products for testing
        \App\Models\Product::create([
            'category_id' => 1,
            'name' => 'Kampas Rem Depan',
            'sku' => 'PROD-001',
            'description' => 'Kampas rem depan untuk berbagai jenis kendaraan',
            'price' => 150000,
            'stock' => 50,
            'brand' => 'Brembo',
            'part_number' => 'KB-001',
            'status' => 'active',
        ]);

        \App\Models\Product::create([
            'category_id' => 2,
            'name' => 'Piston Set',
            'sku' => 'PROD-002',
            'description' => 'Set piston original untuk mesin',
            'price' => 2500000,
            'stock' => 20,
            'brand' => 'Original',
            'part_number' => 'PS-001',
            'status' => 'active',
        ]);

        \App\Models\Product::create([
            'category_id' => 3,
            'name' => 'Oli Mesin SAE 10W-40',
            'sku' => 'PROD-003',
            'description' => 'Oli mesin kualitas premium',
            'price' => 125000,
            'stock' => 100,
            'brand' => 'Castrol',
            'part_number' => 'OIL-001',
            'status' => 'active',
        ]);

        // Create sample customers
        $customer1 = \App\Models\Customer::create([
            'name' => 'Budi Santoso',
            'email' => 'budi@example.com',
            'phone' => '081234567890',
            'address' => 'Jl. Merdeka No. 123',
            'city' => 'Jakarta',
            'province' => 'DKI Jakarta',
            'postal_code' => '10110',
        ]);

        $customer2 = \App\Models\Customer::create([
            'name' => 'Siti Nurhaliza',
            'email' => 'siti@example.com',
            'phone' => '081987654321',
            'address' => 'Jl. Sudirman No. 456',
            'city' => 'Bandung',
            'province' => 'Jawa Barat',
            'postal_code' => '40111',
        ]);

        // Create sample orders
        $order1 = \App\Models\Order::create([
            'order_number' => 'ORD-' . strtoupper(\Illuminate\Support\Str::random(8)),
            'customer_id' => $customer1->id,
            'order_date' => now()->subDays(5),
            'total_amount' => 300000,
            'status' => 'completed',
            'notes' => 'Pesanan pertama',
        ]);

        \App\Models\OrderItem::create([
            'order_id' => $order1->id,
            'product_id' => 1,
            'quantity' => 2,
            'price' => 150000,
            'subtotal' => 300000,
        ]);

        $order2 = \App\Models\Order::create([
            'order_number' => 'ORD-' . strtoupper(\Illuminate\Support\Str::random(8)),
            'customer_id' => $customer2->id,
            'order_date' => now()->subDays(2),
            'total_amount' => 500000,
            'status' => 'processing',
            'notes' => 'Pesanan sedang diproses',
        ]);

        \App\Models\OrderItem::create([
            'order_id' => $order2->id,
            'product_id' => 3,
            'quantity' => 4,
            'price' => 125000,
            'subtotal' => 500000,
        ]);
    }
}

