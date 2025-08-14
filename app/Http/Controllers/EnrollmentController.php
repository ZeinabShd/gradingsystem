<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class EnrollmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $rows = DB::table('enrollment')
        ->join('students','students.id','=','enrollment.student_id')
        ->join('subjects','subjects.id','=','enrollment.subject_id')
        ->leftJoin('submissions','submissions.enrollment_id','=','enrollment.id')
        ->select(
            'enrollment.id as enrollment_id',
            'students.student_id as student_code',
            'students.name as student_name',
            'subjects.name as subject_name',
            'enrollment.progress','enrollment.notes',
            DB::raw('MAX(submissions.score) as last_score'),
            DB::raw('MAX(submissions.date_submitted) as last_date')
        )
        ->groupBy('enrollment.id','students.student_id','students.name','subjects.name','enrollment.progress','enrollment.notes')
        ->orderBy('student_name')
        ->get();

    return view('enrollment.index', compact('rows'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
    $students = Student::orderBy('name')->get(['id','student_id','name']);
    $subjects = Subject::orderBy('name')->get(['id','name']);

    $selectedStudent = (int) $request->get('student'); // may be 0
    $selectedSubject = (int) $request->get('subject');

    return view('enrollment.create', compact('students','subjects', 'selectedStudent','selectedSubject'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      $data = $request->validate([
        'student_id' => ['required','exists:students,id'],
        'subject_id' => ['required','exists:subjects,id'],
        'progress'   => ['required','in:enrolled,in_progress,passed,failed,incomplete'],
        'notes'      => ['nullable','string'],
    ]);

    //Prevent duplicate enrollment for same student+subject
        $exists = Enrollment::where('student_id',$data['student_id'])
            ->where('subject_id',$data['subject_id'])
            ->exists();

        if ($exists) {
            throw ValidationException::withMessages([
                'subject_id' => 'This student is already enrolled in the selected subject.',
            ]);
        }

    Enrollment::create($data);

    return redirect()->route('enrollment.index')->with('ok','Enrollment created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Enrollment $enrollment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Enrollment $enrollment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Enrollment $enrollment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Enrollment $enrollment)
    {
        //
    }
}
