<?php

namespace App\Http\Controllers;

use App\Models\Ballot;
use App\Models\Election;
use Illuminate\Http\Request;
use Auth;

class ElectionController extends Controller
{
    public function electionIndex()
    {
        $elections = Election::where('user_id', auth()->user()->id)->orderBy('election_nm', 'asc')->get();
        $created = Election::where('user_id', auth()->user()->id)->get('created_at');
        return view('election.index', compact('elections', 'created'));
    }

    public function addElection()
    {
        return view('election.create');
    }

    public function electionStore(Request $req)
    {
        $req->validate([
            'election_nm' => 'required | unique:elections,election_nm',
            'start' => 'required|date',
            'end' => 'required|date',
            'desc' => 'required'
        ], [
            'election_nm.required' => 'Election Name is required',
            'election_nm.unique' => 'Election already exist',
            'start.required' => 'The start date of election is required',
            'end.required' => 'The end date of election is required',
            'desc.required' => 'The description of the election is required',
        ]);

        //             'election_nm' => 'required',
        //             'start' => 'required|date',
        //             'end' => 'required|date',
        //             'desc' => 'required'
        //         ]);

        Election::create([
            'user_id' => Auth::id(),
            'election_nm' => $req->election_nm,
            'start_date' => $req->start,
            'end_date' => $req->end,
            'desc' => $req->desc
        ]);

        return redirect()->route('Election.Index')->with('success', 'Election successfully created.');
    }

    public function show($id)
    {
        $election = Election::find($id);
        $ballot = Ballot::where('election_id', $id)->get();
        return view('election.show', compact('election', 'ballot'));
    }

    public function edit($id)
    {
        $election = Election::find($id);
        return view('election.edit', compact('election'));
    }

    public function update(Request $req, $id)
    {
        $req->validate([
            'election_nm' => 'required',
            'start' => 'required|date',
            'end' => 'required|date',
            'desc' => 'required'
        ]);

        Election::find($id)->update([
            'user_id' => Auth::id(),
            'election_nm' => $req->election_nm,
            'start_date' => $req->start,
            'end_date' => $req->end,
            'desc' => $req->desc
        ]);

        return redirect()->route('election.show', $id);
    }

    public function destroy($id)
    {
        Election::destroy($id);
        return redirect()->route('Election.Index');
    }
}
