<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\Job;
use Illuminate\Http\Request;

class CandidateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $candidates = Candidate::orderBy('created_at', 'DESC')->get();

        return view('employee.welcome', compact('candidates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jobs = Job::get();

        return view('employee.create', compact('jobs'));
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
            'job_id' => 'required',
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'year' => 'required',
        ]);

        Candidate::create([
            'job_id' => $request->job_id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'year' => $request->year,
        ]);

        return redirect('candidates')->with('success', 'Berhasil!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Candidate  $candidate
     * @return \Illuminate\Http\Response
     */
    public function show(Candidate $candidate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Candidate  $candidate
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $candidates = Candidate::findorfail($id);
        $jobs = Job::get();

        return view('candidate.edit', compact(['candidates', 'jobs']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Candidate  $candidate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'job_id' => 'required',
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'year' => 'required'
        ]);

        $post = Candidate::findorfail($id);

        $post_data = [
            'job_id' => $request->job_id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'year' => $request->year,
        ];

        $post->update($post_data);

        return redirect('candidates')->with('success', 'Berhasil!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Candidate  $candidate
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $candidates = Candidate::find($id);
        $candidates->delete();

        return redirect('candidates')->with('success', 'Berhasil!');

    }
}
