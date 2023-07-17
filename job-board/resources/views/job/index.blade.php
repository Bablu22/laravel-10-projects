<x-layout>
    <x-bredcrumbs :links="['Jobs' => route('jobs.index')]" />

    <x-card class="mb-4 text-sm" x-data>
        <form x-ref="filters" action="{{ route('jobs.index') }}" method="GET">
            <div class="mb-4 grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-bold text-gray-600 mb-2">Search</label>
                    <x-text-input placeholder="Search for any text" value="{{ request('search') }}" name="search"
                        form-ref="filters" />
                </div>
                <div>
                    <label class="block text-sm font-bold text-gray-600 mb-2">Salry</label>
                    <div class="flex items-center space-x-2 ">
                        <x-text-input placeholder="From" value="{{ request('min_salary') }}" name="min_salary"
                            class="w-1/2 mr-2" form-ref="filters" />
                        <x-text-input placeholder="To" value="{{ request('max_salary') }}" name="max_salary"
                            class="w-1/2" form-ref="filters" />
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-bold text-gray-600 mb-2">Experience</label>
                    <x-radio-group name="experience" :options="array_combine(
                        array_map('ucfirst', \App\Models\Job::$experience),
                        \App\Models\Job::$experience,
                    )" />

                </div>
                <div>
                    <label class="block text-sm font-bold text-gray-600 mb-2">Category</label>
                    <x-radio-group name="category" :options="\App\Models\Job::$category" />
                </div>
            </div>
            <x-button type="submit">
                Filter
            </x-button>
        </form>
    </x-card>

    @foreach ($jobs as $job)
        <x-job-card :job="$job">
            <div>
                <x-link-button :href="route('jobs.show', $job->id)" class="bg-blue-500 hover:bg-blue-600">
                    View Job
                </x-link-button>
            </div>
        </x-job-card>
    @endforeach
</x-layout>
