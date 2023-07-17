<?php

namespace App\Http\Controllers;

use App\Models\JobApplication;

class MyJobApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('my_job_application.index', [
            'jobApplications' => auth()->user()->jobApplications()
                ->with(['job' => fn($query) => $query->withCount('jobApplications')->withAvg('jobApplications', 'expected_salary'),
                    'job.employer',
                ])->latest()->get(),

        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JobApplication $myJobApplication)
    {

        $myJobApplication->delete();
        return redirect()->route('my-job-applications.index')->with('success', 'Job application deleted successfully!');
    }
}
