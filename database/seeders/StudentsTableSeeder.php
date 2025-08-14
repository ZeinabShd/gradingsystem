<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('students')->insert([
            [
                'student_id'  => '001',
                'name'        => 'Ali Ahmad',
                'phone'       => 03631327,
                'address'     => 'Beirut',
                'birth_date'  => '2010-05-12',
                'gender'      => 'male',
                'created_at'  => now(),
                'updated_at'  => now(),
            ],
            [
                'student_id'  => '002',
                'name'        => 'Sara Khalil',
                'phone'       => 71388944,
                'address'     => 'Tripoli',
                'birth_date'  => '2011-02-25',
                'gender'      => 'female',
                'created_at'  => now(),
                'updated_at'  => now(),
            ],
        ]);
    }
}
