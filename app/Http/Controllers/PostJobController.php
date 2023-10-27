<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\JobPost; 
use App\Models\jobApplication; 


class PostJobController extends Controller
{
    
    public function index()
    {
        return view('post-job');
    }
   
    public function store(Request $request)
    {   
        $validatedData = $request->validate([
        'jobTitle' => '',
        'jobDescription' => '',
        'skillsRequired' => '',
        'careerLevel' => '',
        'numPositions' => '',
        'jobLocation' => '', 
        'min_salary' => '',
        'max_salary' => '',
        'salaryVisibility' => '',
        'genderPreference' => '',
        'apply_by_date' => '',
        'qualification' => '',
        'specificDegreeTitle' => '',
        'minExperience' => '',
        'maxExperience' => '',
        'experienceInfo' => '',
        'minAge' => '',
        'maxAge' => '',
        'jobType' => '',
        'created_ by' => '',
        
        ]);

        
        try {
            $jobLocation = json_encode($request->input('jobLocation')); // Convert the array to JSON
    JobPost::create([
        'jobTitle' => $request->input('jobTitle'),
        'jobDescription' => $request->input('jobDescription'),
        'skillsRequired' => $request->input('skillsRequired'),
        'careerLevel' => $request->input('careerLevel'),
        'numPositions' => $request->input('numPositions'),
        'jobLocation' => $jobLocation, // Store as JSON
        'min_salary' => $request->input('min_salary'),
        'max_salary' => $request->input('max_salary'),
        'job_type' => $request->input('job_type'),
        'job_shift' => $request->input('job_shift'),
        'salaryVisibility' => $request->input('salaryVisibility'),
        'genderPreference' => $request->input('genderPreference'),
        'apply_by_date' => $request->input('apply_by_date'),
        'qualification' => $request->input('qualification'),
        'specificDegreeTitle' => $request->input('specificDegreeTitle'),
        'minExperience' => $request->input('minExperience'),
        'maxExperience' => $request->input('maxExperience'),
        'experienceInfo' => $request->input('experienceInfo'),
        'minAge' => $request->input('minAge'),
        'maxAge' => $request->input('maxAge'),
        'jobType' => $request->input('jobType'),
        'company' => $request->input('company'),
        'created_by' => $request->input('created_by'),
    ]);
            return redirect()->route('post-job')->with('success', 'Job posted successfully!');
        } catch (\Exception $e) {
            dd($e->getMessage(), $e->getTraceAsString());
            return redirect()->back()->withErrors(['error' => 'An error occurred while posting the job. Please try again.']);
        }
    }

   
    public function viewPostedJobs()
    {   
        $postedJobs = JobPost::with('jobApplications')->get();
        return view('employer.view-posted-jobs', ['postedJobs' => $postedJobs]);
    }

public function fetchJobPost($jobId)
{
    try {

        $jobPost = JobPost::findOrFail($jobId);


        return response()->json($jobPost);
    } catch (\Exception $e) {
        \Log::error('Error in fetchJobPost: ' . $e->getMessage());

        return response()->json(['error' => 'An error occurred while fetching job details.'], 500);
    }
}

public function viewAppliedJobs()
    {
        $postedJobs = JobPost::all(); 
        return view('candidate\view-applied-jobs', ['postedJobs' => $postedJobs]);
    }

}
