<?php

namespace App\Http\Controllers;

Use App\Models\BallotQuestion;
use App\Models\QuestionAnswer;
use App\Models\Ballot;
use App\Models\Election;
use Illuminate\Http\Request;

class ResultsController extends Controller
{
    //

    public function create($id){
        $elec = Election::where('id', $id)->first();
        $ballot_id = Ballot::where('election_id', $id)->value('id');
        $question = BallotQuestion::where('ballot_id', $ballot_id)->with('quesOpt')->get()->toArray();
        // dd($elec);
        // $question_id = BallotQuestion::where('ballot_id', $ballot_id)->get('id');

        // foreach($question_id as $quest){
        // QuestionAnswer::where('ballot_question_id', $quest->id)->get('answer');
        // }
        
        // foreach($question_id as $quest){
        // $count=QuestionAnswer::where('ballot_question_id', $quest->id)->where('answer', 1)->count();
        // }
        // dd($count);
        return view('ballotCount.index', compact('question', 'elec')); 
    }
}
