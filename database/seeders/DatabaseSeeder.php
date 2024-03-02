<?php

namespace Database\Seeders;
use \App\Models\User as U;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        U::create([
            'username' => 'riosraskaa',
            'fullname' => 'Putera Pratama',
            'bio' => 'Prancis belah kulon',
            'email' => 'asdevubuntu@gmail.com',
            'password' => bcrypt('asdevubuntu@gmail.com'),
        ]);
        U::create([
            'username' => 'riokun',
            'fullname' => 'Putera nurslemanjahaya',
            'bio' => 'Prancis belah wetan',
            'email' => 'riokun@gmail.com',
            'password' => bcrypt('riokun@gmail.com'),
        ]);
    }
}
