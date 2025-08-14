<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">Enrollments</h2>
    </x-slot>

    <div class="p-6">
         <a href="{{ route('enrollment.create') }}" class="inline-block mb-4 bg-blue-600 text-white px-3 py-2 rounded">New Enrollment</a>
           
        <table class="min-w-full border text-sm">
            <thead class="bg-gray-100">
                <tr>
                    <th class="p-2 border">Student ID</th>
                    <th class="p-2 border">Student</th>
                    <th class="p-2 border">Subject</th>
                    <th class="p-2 border">Progress</th>
                    <th class="p-2 border">Notes</th>
                    <th class="p-2 border">Last Score</th>
                    <th class="p-2 border">Last Date</th>
                    <th class="p-2 border">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($rows as $r)
                    <tr>
                        <td class="p-2 border">{{ $r->student_code }}</td>
                        <td class="p-2 border">{{ $r->student_name }}</td>
                        <td class="p-2 border">{{ $r->subject_name }}</td>
                        <td class="p-2 border">{{ $r->progress }}</td>
                        <td class="p-2 border">{{ $r->notes }}</td>
                        <td class="p-2 border">{{ $r->last_score ?? '—' }}</td>
                        <td class="p-2 border">{{ $r->last_date ?? '—' }}</td>
                        <td class="p-2 border">
                        <a href="{{ route('submissions.create', ['enrollment' => $r->enrollment_id]) }}"
       class="text-sm bg-green-600 text-white px-2 py-1 rounded">Add submission</a>
    </td>                
    </tr>
                @empty
                    <tr><td colspan="7" class="p-4 text-center">No enrollments yet.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-app-layout>
