<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('subjects')->insert([
            ['name' => 'Aqida', 'prerequisite' => 'Mantiq', 'description'=>'lorem ndjn ', 'created_at'=>now(), 'updated_at'=>now()],
            ['name' => 'Fiqh', 'prerequisite' => 'Aqida', 'description'=>'lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'created_at'=>now(), 'updated_at'=>now()],
            ['name' => 'Tafsir', 'prerequisite' => null, 'description'=>'lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'created_at'=>now(), 'updated_at'=>now()],
        ]);
    }
}
