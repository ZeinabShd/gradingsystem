<x-app-layout>
    <x-slot name="header"><h2 class="font-semibold text-xl">Add Submission</h2></x-slot>

    <div class="p-6 max-w-xl space-y-4">
        <div class="border rounded p-3 bg-gray-50">
            <p><b>Student:</b> {{ $enrollment->student->name }} ({{ $enrollment->student->student_id }})</p>
            <p><b>Subject:</b> {{ $enrollment->subject->name }}</p>
        </div>

        <form method="POST" action="{{ route('submissions.store') }}" class="space-y-4">
            @csrf
            <input type="hidden" name="enrollment_id" value="{{ $enrollment->id }}">

            <div>
                <label class="block mb-1">Score</label>
                <input type="number" step="0.01" name="score" class="w-full border rounded p-2" required>
                @error('score') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block mb-1">Passed?</label>
                <select name="is_pass" class="w-full border rounded p-2">
                    <option value="">—</option>
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                </select>
            </div>

            <div>
                <label class="block mb-1">Date Submitted</label>
                <input type="date" name="date_submitted" class="w-full border rounded p-2" value="{{ now()->toDateString() }}">
            </div>

            <div class="flex gap-2">
                <button class="bg-green-600 text-white px-4 py-2 rounded">Save Submission</button>
                <a href="{{ route('enrollment.index') }}" class="px-4 py-2 border rounded">Cancel</a>
            </div>
        </form>
    </div>
</x-app-layout>