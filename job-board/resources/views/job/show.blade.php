<x-layout>
    <x-bredcrumbs :$job :links="['Jobs' => route('jobs.index'), $job->title => '#']" />
    <x-job-card :job="$job">

        <p class="text-sm text-gray-700 mb-5">
            {{ $job->description }}
        </p>

        @can('apply', $job)
            <x-link-button href="{{ route('jobs.application.create', $job) }}" class="mt-4">Apply</x-link-button>
        @else
            <div class="text-center text-lg">
                You have already applied for this job.
            </div>
        @endcan

    </x-job-card>

    <x-card class="my-4">
        <h2 class="mb-4 text-lg font-semibold">
            More {{ $job->employer->company_name }} Jobs
        </h2>
        <hr>
        @foreach ($job->employer->jobs as $otherJob)
            <div class="mt-4 flex justify-between">
                <div>
                    <h3 class="text-lg font-semibold mb-2">
                        <a href="{{ route('jobs.show', $otherJob) }}">{{ $otherJob->title }}</a>
                    </h3>
                    <p class="text-sm text-gray-700 mb-2">
                        {{ $otherJob->created_at->diffForHumans() }}
                    </p>
                </div>
                <div>
                    <p class="font-semibold text-gray-700 mb-2">
                        ${{ number_format($otherJob->salary) }}
                    </p>
                </div>
            </div>
        @endforeach

    </x-card>

</x-layout>
