<?php


namespace App\Http\Controllers\FindJob;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

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

}
