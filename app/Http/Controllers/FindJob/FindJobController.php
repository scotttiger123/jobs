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
        
        return view('find.find-job');
    }
   

}
