<?php


namespace App\Http\Controllers\FindJob;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\JobApplication; 
class FindJobController extends Controller
{
    
    public function index()
        {
            $jobs = DB::table('job_posts')
            ->orderBy('created_at', 'desc')
            ->take(10)
            ->get();
        
            return view('find.find-job', ['jobs' => $jobs]);
            
        }

        
        public function findJob(Request $request)
        {
            try {
                $keywords = $request->input('keywords');
                $location = $request->input('location');
                $salary   = $request->input('salary');
                $contract   = $request->input('contract');
                $part_time   = $request->input('part_time');
                $full_time   = $request->input('full_time');
                
                $query = DB::table('job_posts');
        
                if ($keywords) {
                    $query->where('jobTitle', 'like', "%$keywords%");
                }
        
                if ($location) {
                    $query->where('jobLocation', 'like', "%$location%");
                }
                    
                if ($salary) {
                    $query->where('min_salary', '<=', $salary)
                          ->where('max_salary', '>=', $salary);
                    
                }
                
                if ($contract) {
                    $query->where('jobType', '=', $contract);
                }

                if ($part_time) {
                    $query->where('jobType', '=', $part_time);
                }

                if ($full_time) {
                    $query->where('jobType', '=', $full_time);
                }
                    
                
        
                $jobs = $query->orderBy('created_at', 'desc')->get();
        
                return response()->json(['jobs' => $jobs,'salary' => $salary]);
            } catch (\Exception $e) {
                
                \Log::error('Error in findJob: ' . $e->getMessage());
        
                return response()->json(['error' => 'An error occurred while fetching job details.'], 500);
            }
        }
        
    


public function getJobDetails(Request $request, $jobId)
{
    $jobs = DB::table('job_posts');
    $job = $jobs->find($jobId);

    if (!$job) {
        return response()->json(['error' => 'Job not found'], 404);
    }
    
    return response()->json(['job' => $job]);
}


public function saveJobApplication(Request $request)
{
    
    $jobApplication = new JobApplication;
    $jobApplication->job_id = $request->job_id;
    $jobApplication->user_id = auth()->user()->id;
    $jobApplication->apply_job_first_name = $request->apply_job_first_name;
    $jobApplication->apply_job_last_name = $request->apply_job_last_name;
    $jobApplication->apply_job_email = $request->apply_job_email;
    $jobApplication->apply_job_phone = $request->apply_job_phone;
    $jobApplication->cv_saved = $request->cv_saved;
   
    if ($request->hasFile('cv_upload')) {
        $file = $request->file('cv_upload');
        $originalName = $file->getClientOriginalName();
        $cvPath = $file->storeAs('cv', $originalName);
        $jobApplication->cv_upload = $cvPath;
    }
    

    $jobApplication->save();

    
    return response()->json(['message' => 'Application saved successfully']);
}


}
