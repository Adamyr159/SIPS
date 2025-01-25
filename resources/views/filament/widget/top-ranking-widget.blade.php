{{-- <x-filament::widget>
    <x-filament::card>
        <h2 class="text-lg font-bold">Top Ranking - Juara Umum</h2>
        <table class="table-auto w-full border-collapse border border-gray-300">
            <thead>
                <tr>
                    <th class="border border-gray-300 px-4 py-2">Rank</th>
                    <th class="border border-gray-300 px-4 py-2">Student ID</th>
                    <th class="border border-gray-300 px-4 py-2">Average Score</th>
                    <th class="border border-gray-300 px-4 py-2">Top Subjects Count</th>
                    <th class="border border-gray-300 px-4 py-2">Subjects Below 60</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($this->getData()['topRanking'] as $index => $ranking)
                    <tr>
                        <td class="border border-gray-300 px-4 py-2">{{ $index + 1 }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $ranking->student_id }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ number_format($ranking->average_score, 2) }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $ranking->top_subjects_count }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $ranking->subjects_below_60 }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </x-filament::card>
</x-filament::widget> --}}
