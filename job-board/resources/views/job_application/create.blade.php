<x-layout>
    <x-bredcrumbs :$job :links="[
        'Jobs' => route('jobs.index'),
        $job->title => route('jobs.show', $job),
        'Apply' => '#',
    ]" />
    <x-job-card :$job />

    <x-card class="mb-10">
        <h2 class="font-bold text-xl mb-3">Your Job Application</h2>
        <form action="{{ route('jobs.application.store', $job) }}" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="mb-3">
                <x-label :required="true" for="expected_salary">Name</x-label>
                <x-text-input type="number" name="expected_salary" placeholder="00.00" />
            </div>

            <div class="mb-3">
                <x-label :required="true" for="cv">CV</x-label>
                <x-text-input type="file" name="cv" />
            </div>

            <x-button class="mt-4">Apply</x-button>
        </form>
    </x-card>
</x-layout>
