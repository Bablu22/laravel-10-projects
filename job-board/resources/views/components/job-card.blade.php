<x-card class="mb-4">
    <div class="flex justify-between items-center">
        <h2 class="text-xl font-semibold text-gray-800 mb-3">{{ $job->title }}</h2>
        <div class="mb-3 flex items-center space-x-1">
            <x-tag>
                <a
                    href="{{ route('jobs.index', ['category' => $job->category]) }}">{{ Str::ucfirst($job->category) }}</a>
            </x-tag>
            <x-tag><a
                    href="{{ route('jobs.index', ['experience' => $job->experience]) }}">{{ Str::ucfirst($job->experience) }}</a>
            </x-tag>
        </div>
    </div>
    <div class="mb-3 flex items-center space-x-1">
        <p class=" font-semibold text-gray-600">Location:</p>
        <p class=" text-gray-700">{{ $job->location }}</p>
    </div>
    <div class="mb-3 flex items-center space-x-1">
        <p class=" font-semibold text-gray-600">Company:</p>
        <p class=" text-gray-700">{{ $job->employer->company_name }}</p>
    </div>
    <p class=" font-semibold mb-3">Salary: {{ number_format($job->salary) }}</p>

    {{ $slot }}
</x-card>
