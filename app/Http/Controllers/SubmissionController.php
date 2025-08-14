<?php

namespace App\Http\Controllers;

use App\Models\Submission;
use Illuminate\Http\Request;
use App\Models\Enrollment;

class SubmissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $enrollmentId = (int) $request->get('enrollment');
        $enrollment = Enrollment::with(['student','subject'])->findOrFail($enrollmentId);
        return view('submissions.create', compact('enrollment'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
        'enrollment_id' => ['required','exists:enrollment,id'],
        'score'         => ['nullable','numeric'],
        'is_pass'       => ['nullable','boolean'],
        'date_submitted'=> ['nullable','date'],
    ]);

        Submission::create($data);

    // Optional: mark enrollment as passed when a passing submission is added
    if (isset($data['is_pass']) && $data['is_pass']) {
        Enrollment::where('id', $data['enrollment_id'])
            ->update(['progress' => 'passed', 'date_success' => now()->toDateString()]);
    }

    return redirect()->route('enrollment.index')->with('ok','Submission added');
    }

    /**
     * Display the specified resource.
     */
    public function show(Submission $submission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Submission $submission)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Submission $submission)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Submission $submission)
    {
        //
    }
}
