<x-layout>
    <x-bredcrumbs :links="['My Job Applications' => '#']" />

    @forelse ($jobApplications as $applications)
        <x-job-card :job="$applications->job">

            <div class="flex justify-between items-center">
                <div>
                    <p class="text-sm text-gray-700 mb-2">
                        Applied {{ $applications->job->created_at->diffForHumans() }}
                    </p>
                    <p class="text-sm text-gray-700 mb-2">
                        Other {{ Str::plural('applicant:', $applications->job->job_applications_count - 1) }}
                        {{ $applications->job->job_applications_count - 1 }}

                    </p>
                    <p class="text-sm text-gray-700 mb-2">
                        Your asking salary: ${{ number_format($applications->expected_salary) }}
                    </p>
                    <p class="text-sm text-gray-700 mb-2">
                        Average asking salary: $
                        {{ number_format($applications->job->job_applications_avg_expected_salary) }}
                    </p>
                </div>
                <div>
                    <form action="{{ route('my-job-applications.destroy', $applications) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <x-button class="mt-4">Delete</x-button>
                    </form>
                </div>

            </div>
        </x-job-card>
    @empty
        <div class="text-center">
            <div class="text-center text-lg">
                You have not applied for any jobs yet.
            </div>
            <div>
                <a href="{{ route('jobs.index') }}" class="text-center text-lg">
                    Browse Jobs
                </a>
            </div>
        </div>
    @endforelse

</x-layout>
