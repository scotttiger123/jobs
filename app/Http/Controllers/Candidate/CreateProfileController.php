<?php


namespace App\Http\Controllers\Candidate;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
// use App\Models\JobPost; 

class CreateProfileController extends Controller
{
    
    public function index() {
        
        return view('candidate.create-profile');
    }
   
}
