<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubmissionsTableSeeder extends Seeder
{
     public function run(): void
    {
        $enrollAliAqida  = DB::table('enrollment')
                            ->join('students','students.id','=','enrollment.student_id')
                            ->join('subjects','subjects.id','=','enrollment.subject_id')
                            ->where('students.student_id','001')
                            ->where('subjects.name','Aqida')
                            ->value('enrollment.id');

        $enrollSaraFiqh = DB::table('enrollment')
                            ->join('students','students.id','=','enrollment.student_id')
                            ->join('subjects','subjects.id','=','enrollment.subject_id')
                            ->where('students.student_id','002')
                            ->where('subjects.name','Fiqh')
                            ->value('enrollment.id');

        DB::table('submissions')->insert([
            [
                'enrollment_id' => $enrollAliAqida,
                'score'         => 82.50,
                'is_pass'       => true,
                'date_submitted'=> now()->subDays(10),
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
            [
                'enrollment_id' => $enrollSaraFiqh,
                'score'         => 69.00,
                'is_pass'       => true,
                'date_submitted'=> now()->subDays(7),
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
        ]);
    }
}
