<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LeadController extends Controller
{
    //
}

namespace App\Http\Controllers;

use App\Models\Lead;
use Illuminate\Http\Request;

class LeadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $leads = \App\Models\Lead::all();
        return view('index', compact('leads'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('add_lead');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
        'name' => 'required',
        'phone' => 'required',
        'source' => 'required'
    ]);

    Lead::create([
        'name' => $request->name,
        'email' => $request->email,
        'phone' => $request->phone,
        'source' => $request->source,
        'status' => 'new',
        'assigned_to' => null
    ]);
return redirect()->route('leads.index')->with('success', 'Lead added successfully!');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lead  $lead
     * @return \Illuminate\Http\Response
     */
    public function show(Lead $lead)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lead  $lead
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $lead = Lead::findOrFail($id);
    return view('edit', compact('lead'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lead  $lead
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $lead = Lead::findOrFail($id);

        $request->validate([
        'name' => 'required',
        'email' => 'required|email',
        'phone' => 'required',
    ]);

    $lead->update($request->all());
    $lead = \App\Models\Lead::findOrFail($id);

    $lead->update([
        'name' => $request->name,
        'email' => $request->email,
        'phone' => $request->phone,
        'source' => $request->source,
        'status' => $request->status,
    ]);

    return redirect()->route('leads.index')->with('success', 'Lead updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lead  $lead
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Lead::findOrFail($id)->delete();
    return redirect()->route('leads.index')->with('success', 'Lead deleted successfully!');
    }

    /**
 * Display lead reports.
 */
public function reports()
{
    $totalLeads = Lead::count();
    $convertedLeads = Lead::where('status', 'converted')->count();
    $newLeads = Lead::where('status', 'new')->count();

    // Group by source
    $leadsBySource = Lead::select('source', \DB::raw('count(*) as total'))
                         ->groupBy('source')
                         ->get();

    return view('reports', compact('totalLeads', 'convertedLeads', 'newLeads', 'leadsBySource'));
}

}
