<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lead; // ←💥 This is the important line!
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function index()
    {
        $totalLeads = Lead::count();
        $convertedLeads = Lead::where('status', 'converted')->count();
        $newLeads = Lead::where('status', 'new')->count();

        $leadsBySource = Lead::select('source', DB::raw('count(*) as total'))
                            ->groupBy('source')
                            ->get();

        return view('reports', compact('totalLeads', 'convertedLeads', 'newLeads', 'leadsBySource'));
    }
}
