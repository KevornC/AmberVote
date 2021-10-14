<?php

namespace App\Http\Controllers;

use App\Models\Election;
use App\Models\User;
use App\Models\Ballot;
use App\Models\QuesOpt;
use App\Models\QuestionAnswer;
use App\Models\BallotQuestion;
use App\Models\Voter;
use Illuminate\Http\Request;

class QuestionAnswerController extends Controller
{
    //

    public function index()
    {
        return view('questionAnswer.index');
    }

    public function create($id)
    {
        $elec = Election::with('user')->where('id', $id)->get()->toArray();
        $election = Election::where('id', $id)->value('election_nm');
        $ballot = Ballot::where('election_id', $id)->value('id');
        $ballot_question = BallotQuestion::with('quesOpt')->where('ballot_id', $ballot)->get()->toArray();
        $max_res = BallotQuestion::with('quesOpt')->where('ballot_id', $ballot)->value('max_res');
        // dd($max_res);
        return view('questionAnswer.create', compact('ballot_question', 'elec', 'election', 'ballot', 'max_res'));
    }

    public function store(Request $request)
    {
        foreach ($request->answers as $key => $value) {
            $option = quesOpt::where('ballot_question_id', $key)
                ->where('id', $value)->get();
            $option[0]->total_vote++;
            $option[0]->save();
        }
        Voter::find(session('voter_id'))->update([
            'hasVoted' => 1
        ]);
        session()->flush();

        return redirect('/')->with('success', 'Thank you for voting!');
    }
}
