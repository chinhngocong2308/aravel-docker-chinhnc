<?php

namespace Modules\CClassContact\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CClassContactDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET foreign_key_checks = 0;');
        if (DB::table('c_class_contacts')->count() === 0) {
            $positions = ['CEO', 'CTO', 'CFO'];
            $fullnames = [
                'Prashant Shah',
                'Bruce MacKenzie',
                'Maria Gonzalez',
                'John Doe',
                'Alice Johnson',
                'Hiroshi Tanaka',
                'Amina Yusuf',
                'Carlos Alvarez',
                'Olivia Smith',
                'Marcus Wong',
                'Fatima Ahmed',
                'Elena Petrova',
                'Muhammad Faisal',
                'Lucas Silva',
                'Chloe Brown',
                'Rajesh Kumar',
                'Emily Davis',
                'Ahmed Al-Farsi',
                'Sara Müller',
                'George Papadopoulos'
            ];
            $contactLinks = [
                'https://www.linkedin.com/in/ozgulakcam/',
                'https://www.linkedin.com/in/roicevitus/',
                'https://www.linkedin.com/in/ayoluwa-camargo-recursos-humanos/',
            ];

            for ($i = 1; $i <= 20; $i++) {
                DB::table('c_class_contacts')->insert([
                    'company_id' => $i,
                    'fullname' => $fullnames[array_rand($fullnames)],
                    'position' => $positions[($i - 1) % 3],
                    'contact_link' => $contactLinks[array_rand($contactLinks)],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
        DB::statement('SET foreign_key_checks = 1;');
    }
}
