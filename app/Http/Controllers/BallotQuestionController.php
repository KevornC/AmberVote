<?php

namespace App\Http\Controllers;

use App\Models\Ballot;
use Illuminate\Http\Request;
use App\Models\BallotQuestion;
use App\Models\Election;
use App\Models\QuesOpt;
use Auth;

class BallotQuestionController extends Controller
{
    //    Add Ballot question
    public function BQ($id = null)
    {
        $ballot_id = $id;
        $displayBQ = BallotQuestion::where('ballot_id', '=', $ballot_id)->get();
        return view('ballotQuestion.AddBallotQuestion', compact('ballot_id', 'displayBQ'));
    }
    public function AddBQ(Request $request)
    {

        $this->validate($request, [
            'question' => 'required',
            'min_res' => '',
            'max_res' => '',
            'desc' => ''
        ]);
        //    dd($request->ballot_id);
        BallotQuestion::create([
            'ballot_id' => $request->ballot_id,
            'question' => $request->question,
            'max_res' => $request->min_res,
            'min_res' => $request->max_res,
            'desc' => $request->desc
        ]);
        //        return view('ballotQuestion.AddBallotQuestion');
        $ballot_question_id = BallotQuestion::where('ballot_id', $request->ballot_id)->where('question', $request->question)->get('id');
        //        dd($ballot_question_id);
        foreach ($ballot_question_id as $id) {
            $ballot_question_id = $id->id;
        }
        $ballot_id = $request->ballot_id;

        //        $displayBQ=BallotQuestion::where('ballot_id','=',$request->ballot_id)->get();
        //        dd($displayBQ);$displayBO=QuesOpt::with('BallotQuestion')->where('ballot_question_id','=',$request->quest_id)->get();
        //       $displayBO=QuesOpt::with('BallotQuestion')->where('ballot_question_id','=',$request->ballot_question_id)->get();
        //           $ballot_id=$request->ballot_id;
        $displayBQ = BallotQuestion::where('ballot_id', '=', $ballot_id)->get();
        //        dd($displayBQ);
        // return view('ballotQuestion.AddBallotQuestion', compact('ballot_id', 'displayBQ'));
        //
        return redirect()->route('BQ', $ballot_id);
    }
    //    public function ViewBQ(){
    //        $data = BallotQuestion::all();
    ////        dd($data);
    //        return view('ballotQuestion.index',compact('data'));
    //    }

    public function ViewUpdateBQ($id)
    {
        $data = BallotQuestion::find($id);
        //        dd($data);
        return view('ballotQuestion.UpdateBallotQuestion', compact('data'));
    }

    public function UpdateBQ(Request $request)
    {
        //$a =BallotQuestion::find($request->id)->get();
        //dd($a);
        BallotQuestion::find($request->id)->update([
            'question' => $request->question,
            'max_res' => $request->min_res,
            'min_res' => $request->max_res,
            'desc' => $request->desc
        ]);
        //        return redirect()->back()->with('update','Successfully updated');
        return redirect()->route('BQ', $request->ballot_id);
    }

    public function DeleteBQ($id)
    {
        //        dd($id);
        $ballot_id = BallotQuestion::find($id)->first()->toArray();
        //        dd($ballot_id);
        $ballot_id = $ballot_id['ballot_id'];
        QuesOpt::where('ballot_question_id', $id)->delete();
        BallotQuestion::destroy($id);
        //        dd($ballot_id);
        return redirect()->route('BQ', $ballot_id);
    }
}
