<?php


namespace App\Http\Controllers\Candidate;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\CandidateProfile; 
use App\Models\CandidateWorkExperience; 
use App\Models\user; 

class CreateProfileController extends Controller
{
    
    public function index() {
        
        return view('candidate.create-profile');
    }

    public function profile()
    {
        $userId = auth()->user()->id; 
        $candidateProfile = CandidateProfile::where('user_id', $userId)->first();

        return view('candidate.profile', compact('candidateProfile'));
    }

    
    

    public function saveInfo(Request $request)
    {
        $data = $request->validate([
            'first_name' => 'nullable',
            'last_name' => 'nullable',
            'headline' => 'nullable',
            'phone' => 'nullable',
            'email' => 'nullable',
            'city' => 'nullable',
            'country' => 'nullable',
            'address' => 'nullable',
            'postal_code' => 'nullable',
            'summary' => 'nullable',
        ]);
        $user = Auth::user();
        $candidateProfile = $user->candidateProfile;
    
        
        if (!$candidateProfile) {
            $candidateProfile = new CandidateProfile($data);
            $user->candidateProfile()->save($candidateProfile);
        } else {
           
            $candidateProfile->update($data);
        }
    
        return response()->json([
            'message' => 'Data saved successfully',
            'candidate_profile' => $candidateProfile
        ]);
    }
    
    public function saveWork(Request $request)
    {
        $validatedData = $request->validate([
            'company_name' => 'nullable',
            'job_title' => 'nullable',
            'start_date' => 'nullable',
            'end_date' => 'nullable',
            'description' => 'nullable',
        ]);
    
        $workExperience = new CandidateWorkExperience($validatedData);
    
        $user = Auth::user();
        $workExperience->user_id = $user->id;
    
        $workExperience->save();
    
        return response()->json([
            'message' => 'Data saved successfully',
            'work_experience' => $workExperience 
        ]);
    }
    


}
