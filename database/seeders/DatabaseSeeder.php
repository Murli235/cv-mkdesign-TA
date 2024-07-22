<?php

namespace Database\Seeders;

use App\Models\AboutUs;
use App\Models\Galery;
use App\Models\Pemesanan;
use App\Models\Project;
use App\Models\Survei;
use App\Models\Testimoni;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Testing\Fakes\Fake;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Owner',
            'email' => 'owner@gmail.com',
            'phone' => fake()->phoneNumber(),
            'address' => fake()->address(),
            'password' => Hash::make('12345678'),
            'role' => 'Owner'
        ]);

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'cvmegakreasidesign@gmail.com',
            'phone' => fake()->phoneNumber(),
            'address' => fake()->address(),
            'password' => Hash::make('87654321'),
            'role' => 'Admin'
        ]);

        AboutUs::create([
            'description' => fake()->text(),
            'phone' => fake()->phoneNumber(),
            'email' => fake()->safeEmail(),
            'instagram_link' => '',
            'maps_link' => '',
        ]);

        for ($i = 1; $i <= 3; $i++) {
            Project::create([
                'name' => 'Project Dumies ' . $i,
                'theme' => 'MODERN CLASSIC ' . $i,
                'category' => 'RESIDENTIAL ' . $i,
                'description' => 'Luas ruangan terbatas dapat tetap memenuhi kebutuhan dari penggunanya jika didesain dengan tepat. Penggunaan kabinet kabinet tinggi yang efisien dan penyusunan layout yang baik dapat memaksimalkan efektifitas interior. Penggunaan palet warna yang terang dan netral dapat memberikan kesan luas dan lega. Tambahan warna warna earthy dapat menjadi aksen yang kontras pada interior.'
            ]);

            for ($j = 1; $j <= 18; $j++) {
                Galery::create([
                    'project_id' => $i,
                    'image' => 'avatar-1.png'
                ]);
            }
        }

        Testimoni::create([
            'user_id' => 1,
            'rating' => 5,
            'comment' => fake()->text()
        ]);

        Testimoni::create([
            'user_id' => 1,
            'rating' => 5,
            'comment' => fake()->text()
        ]);
        Testimoni::create([
            'user_id' => 1,
            'rating' => 5,
            'comment' => fake()->text()
        ]);
        Testimoni::create([
            'user_id' => 1,
            'rating' => 5,
            'comment' => fake()->text()
        ]);
        // Testimoni::create([
        //     'user_id' => 1,
        //     'rating' => 5,
        //     'comment' => fake()->text()
        // ]);
        // Testimoni::create([
        //     'user_id' => 1,
        //     'rating' => 5,
        //     'comment' => fake()->text()
        // ]);
        // Testimoni::create([
        //     'user_id' => 1,
        //     'rating' => 5,
        //     'comment' => fake()->text()
        // ]);
        // Testimoni::create([
        //     'user_id' => 1,
        //     'rating' => 5,
        //     'comment' => fake()->text()
        // ]);

        // Survei::create([
        //     'name' => fake()->name(),
        //     'projectName' => 'Rumah Idaman ' . fake()->safeColorName(),
        //     'email' => fake()->safeEmail(),
        //     'phone' => fake()->phoneNumber(),
        //     'city' => fake()->city(),
        //     'address' => fake()->address(),
        //     'surveiDate' => fake()->date('Y-m-d'),
        //     'surveiTime' => '09:00 - Selesai',
        //     'designType' => 'Interior',
        //     'cost' => 400000,
        //     'status' => 'Paid',
        //     'paymentReceipt' => 'avatar-1.png'
        // ]);

        // Pemesanan::create([
        //     'name' => fake()->name(),
        //     'projectName' => 'Rumah Idaman ' . fake()->safeColorName(),
        //     'email' => fake()->safeEmail(),
        //     'phone' => fake()->phoneNumber(),
        //     'jumlah_tingkat' => fake()->numberBetween(1, 5),
        //     'luas_bangunan' => fake()->numberBetween(1, 10),
        //     'designType' => 'Paket A',
        //     'cost' => 400000,
        //     'status' => 'Paid',
        //     'paymentReceipt' => 'avatar-1.png'
        // ]);
    }
}
