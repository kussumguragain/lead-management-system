<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lead;

class AdminController extends Controller
{
   public function dashboard()
{
    $totalLeads = Lead::count();
    $convertedLeads = Lead::where('status', 'converted')->count();
    $newLeads = Lead::where('status', 'new')->count();

    return view('dashboard', compact('totalLeads', 'convertedLeads', 'newLeads'));
}

}
?>