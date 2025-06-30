<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lead;

class AdminController extends Controller
{
    public function dashboard()
{
    $totalLeads = \App\Models\Lead::count();
    $convertedLeads = \App\Models\Lead::where('status', 'converted')->count();
    $newLeads = \App\Models\Lead::where('status', 'new')->count();

    return view('dashboard', compact('totalLeads', 'convertedLeads', 'newLeads'));
}

}
?>