<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            ['name_kh' => 'សុខ ប៊ុនថារ៉ា', 'name_en' => 'sok bunthara'],
            ['name_kh' => 'ចាន់ វាសនា', 'name_en' => 'chan veasna'],
            ['name_kh' => 'លី សុផានី', 'name_en' => 'ly sophany'],
            ['name_kh' => 'សំ ណាល', 'name_en' => 'som neal'],
            ['name_kh' => 'កែវ មុន្នីរ័ត្ន', 'name_en' => 'keo monyrath'],
            ['name_kh' => 'វ៉ាន់ ចន្ទ័លក្ខណា', 'name_en' => 'van chanleakhna'],
            ['name_kh' => 'ឃឿង វិចិត្រ', 'name_en' => 'khueng vichetr'],
            ['name_kh' => 'ប៉េង សុវណ្ណា', 'name_en' => 'peng sovanna'],
            ['name_kh' => 'ឡុង វណ្ណៈ', 'name_en' => 'long vanna'],
            ['name_kh' => 'សុខ លក្ខិណា', 'name_en' => 'sok lekhina'],
        ];

        foreach ($users as $user) {
            $email = str_replace(' ', '.', strtolower($user['name_en'])) . '@example.com';

            User::factory()->create([
                'name' => $user['name_kh'],
                'email' => $email,
                'password' => Hash::make('password'), 
            ]);
        }
    }
}
