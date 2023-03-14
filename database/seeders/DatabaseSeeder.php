<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('rooms')->insert([
            [
                'room' => 'The Office',
                'slug' => 'the-office',
                'limit' => 4,
                'users_in' => 0,
            ],
            [
                'room' => 'Open Office 1',
                'slug' => 'open-office-1',
                'limit' => 9,
                'users_in' => 0,
            ],
            [
                'room' => 'Open Office 2',
                'slug' => 'open-office-2',
                'limit' => 4,
                'users_in' => 0,
            ],
            [
                'room' => 'Silent room 1',
                'slug' => 'silent-room-1',
                'limit' => 1,
                'users_in' => 0,
            ],
            [
                'room' => 'Silent room 2',
                'slug' => 'silent-room-2',
                'limit' => 1,
                'users_in' => 0,
            ],
            [
                'room' => 'Silent room 3',
                'slug' => 'silent-room-3',
                'limit' => 2,
                'users_in' => 0,
            ],
            [
                'room' => 'Meeting room',
                'slug' => 'meeting-room',
                'limit' => 15,
                'users_in' => 0,
            ],
            [
                'room' => 'Break room',
                'slug' => 'break-room',
                'limit' => 5,
                'users_in' => 0,
            ],
            [
                'room' => 'Kitchen',
                'slug' => 'kitchen',
                'limit' => 5,
                'users_in' => 0,
            ],
            [
                'room' => 'Desk',
                'slug' => 'desk',
                'limit' => 3,
                'users_in' => 0,
            ],
        ]);
    }
}
