<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EnrollmentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Grab a couple of student ids and all subjects
        $students = DB::table('students')->pluck('id','student_id'); // ['S1001'=>1, 'S1002'=>2]
        $aqidaId   = DB::table('subjects')->where('name','Aqida')->value('id');
        $fikhId   = DB::table('subjects')->where('name','Fiqh')->value('id');

        DB::table('enrollment')->insert([
            [
                'student_id'  => $students['001'],
                'subject_id'  => $aqidaId,
                'progress'    => 'in_progress',
                'notes'       => 'Needs practice with algebra.',
                'created_at'  => now(),
                'updated_at'  => now(),
            ],
            [
                'student_id'  => $students['002'],
                'subject_id'  => $fikhId,
                'progress'    => 'enrolled',
                'notes'       => 'Transferred this term.',
                'created_at'  => now(),
                'updated_at'  => now(),
            ],
        ]);
    }
}
