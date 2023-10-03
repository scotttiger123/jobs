<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\JobPost; 


class PostJobController extends Controller
{
    
    public function index()
    {
        return view('post-job');
    }
   
    public function store(Request $request)
    {   
        $validatedData = $request->validate([
        'jobTitle' => 'required|string',
        'jobDescription' => 'required|string',
        'skillsRequired' => 'required|string',
        
        ]);

        
        try {
            JobPost::create($validatedData);
            return redirect()->route('post-job')->with('success', 'Job posted successfully!');
        } catch (\Exception $e) {
            dd($e->getMessage(), $e->getTraceAsString());
            return redirect()->back()->withErrors(['error' => 'An error occurred while posting the job. Please try again.']);
        }
    }
}
