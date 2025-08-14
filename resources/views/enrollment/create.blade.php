<x-app-layout>
    <x-slot name="header"><h2 class="font-semibold text-xl">New Enrollment</h2></x-slot>

    <div class="p-6 max-w-xl space-y-4">
        <form method="POST" action="{{ route('enrollment.store') }}" class="space-y-4">
            @csrf

            <div>
                <label class="block mb-1">Student</label>
                <select name="student_id" class="w-full border rounded p-2" required>
        @foreach($students as $st)
            <option value="{{ $st->id }}"
                {{ (isset($selectedStudent) && $selectedStudent == $st->id) ? 'selected' : '' }}>
                {{ $st->student_id }} — {{ $st->name }}
            </option>
        @endforeach
    </select>
                @error('student_id') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block mb-1">Subject</label>
                <select name="subject_id" class="w-full border rounded p-2" required>
        @foreach($subjects as $subj)
            <option value="{{ $subj->id }}"
                {{ (isset($selectedSubject) && $selectedSubject == $subj->id) ? 'selected' : '' }}>
                {{ $subj->name }}
            </option>
        @endforeach
    </select>
                @error('subject_id') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block mb-1">Progress</label>
                <select name="progress" class="w-full border rounded p-2">
                    @foreach(['enrolled','in_progress','passed','failed','incomplete'] as $p)
                        <option value="{{ $p }}">{{ $p }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block mb-1">Notes</label>
                <textarea name="notes" rows="3" class="w-full border rounded p-2"></textarea>
            </div>

            <div class="flex gap-2">
                <button class="bg-blue-600 text-white px-4 py-2 rounded">Save</button>
                <a href="{{ route('enrollment.index') }}" class="px-4 py-2 border rounded">Cancel</a>
            </div>
        </form>
    </div>
</x-app-layout>