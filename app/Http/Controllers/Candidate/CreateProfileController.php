<?php


namespace App\Http\Controllers\Candidate;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\CandidateProfile; 
use App\Models\CandidateWorkExperience; 
use App\Models\CandidateEducation;
use App\Models\CandidateSkill; 
use App\Models\CandidateCertification; 
use App\Models\JobApplication; 
use App\Models\JobPost; 

use App\Models\user; 


class CreateProfileController extends Controller
{
    

    
    public function checkJobApplicationStatus(Request $request, $jobId)
    {
        
         $userId = auth()->id();
         $jobId;
        $applied = JobApplication::where('job_id', $jobId)
            ->where('user_id', $userId)
            ->exists();

        return response()->json(['applied' => $applied]);
    }



    public function index() {
        
        return view('candidate.create-profile');
    }

public function profile()
    {
        $userId = auth()->user()->id;
        $email  = auth()->user()->email; 
        $candidateProfile = CandidateProfile::where('user_id', $userId)->first();
        $workExperiences = CandidateWorkExperience::where('user_id', $userId)->get();
        $candidateEducations = CandidateEducation::where('user_id', $userId)->get();
        $candidateSkills = CandidateSkill::where('user_id', $userId)->get();
        $certifications = CandidateCertification::where('user_id', $userId)->get();
        return view('candidate.profile', compact('candidateProfile', 'workExperiences','candidateEducations','candidateSkills','certifications','email'));
    }

    
    public function getCandidateCV()
    {
            $userId = auth()->user()->id; 
            $email = auth()->user()->email; 
            $candidateProfile = CandidateProfile::where('user_id', $userId)->first();
            $workExperiences = CandidateWorkExperience::where('user_id', $userId)->get();
            $candidateEducations = CandidateEducation::where('user_id', $userId)->get();
            $candidateSkills = CandidateSkill::where('user_id', $userId)->get();
            $certifications = CandidateCertification::where('user_id', $userId)->get();
            
            
            $candidateData = [
                
                'email' => $email,
                'profile' => $candidateProfile,
                'work_experiences' => $workExperiences,
                'educations' => $candidateEducations,
                'skills' => $candidateSkills,
                'certifications' => $certifications,
            ];

            return response()->json($candidateData);
    }

    
    public function applyJob(Request $request)
    {
        $jobId = $request->query('jobId'); 

        return view('candidate.apply-job', ['jobId' => $jobId]);
    }


    public function saveInfo(Request $request)
    {
        // Validate the incoming data
        $request->validate([
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
    
        // Get the authenticated user
        $user = auth()->user();
    
        // Create or update the user's profile
        $data = [
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'headline' => $request->input('headline'),
            'phone' => $request->input('phone'),
            'email' => $request->input('email'),
            'city' => $request->input('city'),
            'country' => $request->input('country'),
            'address' => $request->input('address'),
            'postal_code' => $request->input('postal_code'),
            'summary' => $request->input('summary'),
        ];
    
        // Handle the profile picture
        if ($request->hasFile('profile_image')) {
            $file = $request->file('profile_image');
            $fileName = 'profile_image_' . time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/profile_images', $fileName); 
            $data['profile_image'] = $fileName;
        }
    
       
        $profile = $user->candidateProfile()->updateOrcreate([], $data);

        return response()->json(['message' => 'Data saved successfully', 'candidate_profile' => $profile]);

    }
    

    
    public function saveEducation(Request $request)
    {
        $validatedData = $request->validate([
            'edu_level_of_education' => 'nullable',
            'edu_field_of_study' => 'nullable',
            'edu_school' => 'nullable',
            'edu_country' => 'nullable',
            'edu_city' => 'nullable',
            'edu_start_date' => 'nullable',
            'edu_end_date' => 'nullable',
        ]);
    
        $CandidateEducation = new CandidateEducation($validatedData);
    
        $user = Auth::user();
        $CandidateEducation->user_id = $user->id;
        $CandidateEducation->save();
    
       
        $allCandidateEducation = CandidateEducation::where('user_id', $user->id)->get();
    
        return response()->json([
            'message' => 'Data saved successfully',
            'candidate_education' => $allCandidateEducation,
        ]);
    }
    
    public function saveSkill(Request $request)
    {
        $validatedData = $request->validate([
            'skill_name' => 'nullable',
            'year_of_experience' => 'nullable',
        ]);
    
        $workExperience = new CandidateSkill($validatedData);
    
        $user = Auth::user();
        $workExperience->user_id = $user->id;
        $workExperience->save();
    
        $allWorkExperiences = CandidateSkill::where('user_id', $user->id)->get();
    
        return response()->json([
            'message' => 'Data saved successfully',
            'candidate_skills' => $allWorkExperiences,
        ]);
    }

    public function editSkill(Request $request)
    {
        $validatedData = $request->validate([
            'skill_name' => 'nullable',
            'year_of_experience' => 'nullable',
            
        ]);
    
        $user = Auth::user();
        $workExperience = null;
    
        
        if ($request->has('edit_skill_id')) {
            $workExperience = CandidateSkill::find($request->input('edit_skill_id'));
    
            
            if ($workExperience && $workExperience->user_id == $user->id) {
                
                $workExperience->update($validatedData);
            }
        }
    
        // Get all work experiences for the current user
        $allWorkExperiences = CandidateSkill::where('user_id', $user->id)->get();
    
        return response()->json([
            'message' => 'Data saved successfully',
            'candidate_skills' => $allWorkExperiences,
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
    
        // Get all work experiences for the current user
        $allWorkExperiences = CandidateWorkExperience::where('user_id', $user->id)->get();
    
        return response()->json([
            'message' => 'Data saved successfully',
            'work_experiences' => $allWorkExperiences,
        ]);
    }
    
    public function saveCertification(Request $request)
    {
        $validatedData = $request->validate([
            'certificate_name' => 'nullable',
            'certificate_start_date' => 'nullable',
            'certificate_end_date' => 'nullable',
            'certificate_description' => 'nullable',
        ]);
    
        $workExperience = new CandidateCertification($validatedData);
    
        $user = Auth::user();
        $workExperience->user_id = $user->id;
        $workExperience->save();
    
        $allWorkExperiences = CandidateCertification::where('user_id', $user->id)->get();
    
        return response()->json([
            'message' => 'Data saved successfully',
            'certifications' => $allWorkExperiences,
        ]);
    }
    

    public function editWork(Request $request)
    {
        $validatedData = $request->validate([
            'company_name' => 'nullable',
            'job_title' => 'nullable',
            'start_date' => 'nullable',
            'end_date' => 'nullable',
            'description' => 'nullable',
        ]);
    
        $user = Auth::user();
        $workExperience = null;
    
        
        if ($request->has('w_edit_id')) {
            $workExperience = CandidateWorkExperience::find($request->input('w_edit_id'));
    
            
            if ($workExperience && $workExperience->user_id == $user->id) {
                
                $workExperience->update($validatedData);
            }
        }
    
        // Get all work experiences for the current user
        $allWorkExperiences = CandidateWorkExperience::where('user_id', $user->id)->get();
    
        return response()->json([
            'message' => 'Data saved successfully',
            'work_experiences' => $allWorkExperiences,
        ]);
    }
   
    
    public function editEducation(Request $request)
    {
        $validatedData = $request->validate([
            'edu_level_of_education' => 'nullable',
            'edu_field_of_study' => 'nullable',
            'edu_school' => 'nullable',
            'edu_country' => 'nullable',
            'edu_city' => 'nullable',
            'edu_start_date' => 'nullable',
            'edu_end_date' => 'nullable',
            'edit_edu_id' => 'nullable',
        ]);
    
        $user = Auth::user();
        $workExperience = null;
    
        
        if ($request->has('edit_edu_id')) {
            $workExperience = CandidateEducation::find($request->input('edit_edu_id'));
    
            
            if ($workExperience && $workExperience->user_id == $user->id) {
                
                $workExperience->update($validatedData);
            }
        }
    
        // Get all work experiences for the current user
        $allWorkExperiences = CandidateEducation::where('user_id', $user->id)->get();
    
        return response()->json([
            'message' => 'Data saved successfully',
            'work_experiences' => $allWorkExperiences,
        ]);
    }


    public function destroy($id)
    {
        $workExperience = CandidateWorkExperience::find($id);

        if (!$workExperience) {
            return response()->json(['success' => false]);
        }
    
        $workExperience->delete();

    return response()->json(['success' => true]);
    }

    public function destroyEducation($id)
    {
        $workExperience = CandidateEducation::find($id);

        if (!$workExperience) {
            return response()->json(['success' => false]);
        }
    
        $workExperience->delete();

    return response()->json(['success' => true]);
    }

    public function destroySkill($id)
    {
        $workExperience = CandidateSkill::find($id);

        if (!$workExperience) {
            return response()->json(['success' => false]);
        }
    
        $workExperience->delete();

    return response()->json(['success' => true]);
    }

    public function destroyCertificate($id)
    {
        $workExperience = CandidateCertification::find($id);

        if (!$workExperience) {
            return response()->json(['success' => false]);
        }
    
        $workExperience->delete();

    return response()->json(['success' => true]);
    }



public function viewAppliedJobs()
{
    // Get the ID of the authenticated user
    $userId = auth()->id();

    // Retrieve job applications for the authenticated user
    $appliedJobs = JobApplication::where('user_id', $userId)->get();

    // Load the associated job details for each job application
    $appliedJobs->load('JobPost');

    return view('candidate.view-applied-jobs', ['appliedJobs' => $appliedJobs]);
}
   

}
