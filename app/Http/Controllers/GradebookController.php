<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class GradebookController extends Controller
{
    public function index()
    {
        // All subjects (columns)
        $subjects = DB::table('subjects')
            ->orderBy('name')
            ->get(['id','name']);

        // All students (rows)
        $students = DB::table('students')
            ->orderBy('student_id')
            ->get(['id','student_id','name']);

        // Matrix source: one row per student+subject with the enrollment id (if any) and the latest score/date
        $cells = DB::table('students')
            ->leftJoin('enrollment', 'enrollment.student_id', '=', 'students.id')
            ->leftJoin('subjects',   'subjects.id',          '=', 'enrollment.subject_id')
            ->leftJoin('submissions', 'submissions.enrollment_id', '=', 'enrollment.id')
            ->select(
                'students.id as sid',
                'subjects.id as subid',
                'enrollment.id as eid',
                DB::raw('MAX(submissions.date_submitted) as last_date'),
                DB::raw('MAX(submissions.score) as last_score') // good enough for demo; latest-by-date can be done if you want
            )
            ->groupBy('sid','subid','eid')
            ->get();

        // Build a fast lookup: [student_id][subject_id] => ['eid'=>..,'score'=>..,'date'=>..]
        $matrix = [];
        foreach ($cells as $c) {
            if (!isset($matrix[$c->sid])) $matrix[$c->sid] = [];
            $matrix[$c->sid][$c->subid] = [
                'eid'   => $c->eid,
                'score' => $c->last_score,
                'date'  => $c->last_date,
            ];
        }

        return view('gradebook.index', compact('subjects','students','matrix'));
    }
}
?>
