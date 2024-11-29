<?php

namespace Modules\Job\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Modules\Company\App\Models\Company;
use Modules\Job\App\Models\Job;
use Carbon\Carbon;

/**
 * Class JobController
 * @package Modules\Job\App\Http\Controllers
 */
class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jobs = Job::all();
        return view('job::admin.index', compact('jobs'));
    }

    /**
     * @param  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function findById($id)
    {
        $job = Job::with('company')->find($id);

        if (!$job) {
            return response()->json([
                'status' => 'error',
                'message' => 'Job not found'
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'data' => $job
        ]);
    }

    /**
     * Display a listing of the resource.
     */
    public function search(Request $request)
    {
        $companyID = $request->input('company_id');

        $locationSearchParams = $request->input('location');

        $jobtypeSearchParams = $request->input('job_type');

        $openDateSearchParams = $request->input('open_date');

        $employmentTypeSearchParams = $request->input('employment_type');

        $jobs = Job::with(['company'])->orderBy('id', 'asc');

        if($companyID) {
            $jobs = $jobs->where('company_id', $companyID);
        } 

        if (!empty($locationSearchParams)) {
            $locationSearchParams = explode('+', $locationSearchParams);  
            $jobs =  $jobs->where(function ($query) use ($locationSearchParams) {
                foreach ($locationSearchParams as $location) {
                    $query->orWhere('job_location', 'like', '%' . trim($location) . '%');
                }
            });

        }

        if (!empty($jobtypeSearchParams)) {
            $jobtypeSearchParams = explode(',', $jobtypeSearchParams);  
            $jobs  =  $jobs->where(function ($query) use  ($jobtypeSearchParams) {
                foreach ($jobtypeSearchParams as $jobtype) {
                    $query->orWhere('job_type', '=',trim($jobtype));
                }
            });

        }

        if (!empty($openDateSearchParams)) {
            $openDateSearchParams = explode(',', $openDateSearchParams);  
            $jobs  =  $jobs->where(function ($query) use ($openDateSearchParams) {
                foreach ($openDateSearchParams as $opendate) {
                    $opendate = getDateFromString($opendate);
                    if(!empty($opendate)) {
                        $query->orWhere('open_date', '>=', trim($opendate));
                    }
                }
            });

        }

        if (!empty($employmentTypeSearchParams)) {
            $employmentTypeSearchParams = explode(',', $employmentTypeSearchParams);  
            $jobs  =  $jobs->where(function ($query) use ($employmentTypeSearchParams) {
                foreach ($employmentTypeSearchParams as $employmentType) {
                    if(!empty($employmentType)) {
                        $query->orWhere('employment_type', '=', trim($employmentType));
                    }
                }
            });

        }
        $totalJobs = $jobs->count();

        $jobs = $jobs->paginate(10);

        return view('job::jobs-search', compact('jobs', 'totalJobs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $companies = Company::all();
        return view('job::admin.create', compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $employmentTypes = $request->input('employment_type', []);
        $jobTypes = $request->input('job_type', []);

        $employmentTypesString = implode(',', $employmentTypes);
        $jobTypesString = implode(',', $jobTypes);

        Job::create(array_merge(
            $request->except(['employment_type', 'job_type']),
            [
                'employment_type' => $employmentTypesString,
                'job_type' => $jobTypesString,
            ]
        ));

        return redirect()->route('job.index')->with('success', 'Job created successfully!');
    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        $job = Job::findOrFail($id);
        $companies = Company::all();

        return view('job::admin.show', compact('job', 'companies'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $job = Job::findOrFail($id);
        $companies = Company::all();
        return view('job::admin.edit', compact('job', 'companies'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $job = Job::findOrFail($id);

        $employmentTypes = $request->input('employment_type', []);
        $jobTypes = $request->input('job_type', []);

        $employmentTypesString = implode(',', $employmentTypes);
        $jobTypesString = implode(',', $jobTypes);

        $job->update(array_merge(
            $request->except(['employment_type', 'job_type']),
            [
                'employment_type' => $employmentTypesString,
                'job_type' => $jobTypesString,
            ]
        ));

        return redirect()->route('job.index')->with('success', 'Job updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $job = Job::findOrFail($id);
        $job->delete();

        return redirect()->route('job.index');
    }
}
