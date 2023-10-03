<?php


namespace App\Http\Controllers\DashboardController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    
    public function index()
    {
        $user = auth()->user(); 
    
        return view('dashboard');
    }
    


    public function getEmailLogData($campaignId) {
        
        try {
            $userId = Auth::id();
            $emailLogData = EmailLog::where('campaign_id', $campaignId)
                ->where('user_id', $userId) 
                ->select([
                    'campaign_id',
                    DB::raw('COUNT(*) as total_sent'),
                    DB::raw('SUM(CASE WHEN opened_at IS NOT NULL THEN 1 ELSE 0 END) as total_opened')
                ])
                ->groupBy('campaign_id')
                ->first();
            
                $record = EmailLog::where('campaign_id', $campaignId)->get();
                

            if ($emailLogData) {
                return response()->json([
                    'campaign_id' => $emailLogData->campaign_id,
                    'total_sent' => $emailLogData->total_sent,
                    'total_opened' => $emailLogData->total_opened,
                    'record'     => $record
                ]);
            } else {
                return response()->json([
                    'campaign_id' => $campaignId,
                    'total_sent' => 0,
                    'total_opened' => 0,
                ]);
            }
        } catch (\Exception $e) {
            \Log::error('Error fetching email log data: ' . $e->getMessage());
            return response()->json(['error' => 'Error fetching data'], 500); 
        }
    }

}
