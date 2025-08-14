<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">Gradebook</h2>
    </x-slot>

    <div class="p-6 overflow-auto">
        <table class="min-w-full border text-sm">
            <thead class="bg-gray-100">
                <tr>
                    <th class="p-2 border text-left">Student ID</th>
                    <th class="p-2 border text-left">Student</th>
                    @foreach($subjects as $sub)
                        <th class="p-2 border text-center">{{ $sub->name }}</th>
                    @endforeach
                    <th class="p-2 border text-center">+ Subject</th>
                </tr>
            </thead>

            <tbody>
            @foreach($students as $s)
                <tr>
                    <td class="p-2 border">{{ $s->student_id }}</td>
                    <td class="p-2 border">{{ $s->name }}</td>

                    @foreach($subjects as $sub)
                        @php
                            $cell = $matrix[$s->id][$sub->id] ?? null;
                        @endphp

                        <td class="p-2 border text-center">
                            @if($cell && $cell['eid'])
                                {{-- enrolled: show score (or —) and add mark --}}
                                <div>{{ $cell['score'] !== null ? number_format($cell['score'], 2) : '—' }}</div>
                                <a href="{{ route('submissions.create', ['enrollment' => $cell['eid']]) }}"
                                   class="mt-1 inline-block text-xs bg-green-600 text-white px-2 py-1 rounded">
                                   Add mark
                                </a>
                            @else
                                {{-- not enrolled: offer enroll --}}
                                <a href="{{ route('enrollment.create', ['student' => $s->id, 'subject' => $sub->id]) }}"
                                   class="inline-block text-xs bg-blue-600 text-white px-2 py-1 rounded">
                                   Enroll
                                </a>
                            @endif
                        </td>
                    @endforeach

                    <td class="p-2 border text-center">
                        {{-- add a new subject enrollment for this student --}}
                        <a href="{{ route('enrollment.create', ['student' => $s->id]) }}"
                           class="inline-block text-xs bg-indigo-600 text-white px-2 py-1 rounded">
                           Add Subject
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>