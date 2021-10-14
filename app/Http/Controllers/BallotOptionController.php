<?php

namespace App\Http\Controllers;

use App\Models\BallotQuestion;
use Illuminate\Http\Request;
use App\Models\QuesOpt;

class BallotOptionController extends Controller
{

    public function BO($id)
    {
        $ballot_id = BallotQuestion::find($id)->first('ballot_id')->toArray();
        $ballot_id = $ballot_id['ballot_id'];
        $ballot_question_id = $id;
        $displayBO = QuesOpt::where('ballot_question_id', $ballot_question_id)->get();
        return view('ballotOption.AddBallotOption', compact('ballot_question_id', 'ballot_id', 'displayBO'));
    }

    public function AddBO(Request $request)
    {
        $this->validate($request, [
            'option' => 'required',
            'photo' => 'unique:ques_opts,option',
            'desc' => 'required'
        ]);

        $photo = null;
        if ($request->file !== null) {
            $photo = $request->file('photo')->getClientOriginalName();
            $request->file('photo')->move('images', $photo);
        }

        QuesOpt::create([
            'ballot_question_id' => $request->quest_id,
            'option' => $request->option,
            'photo' => $photo,
            'opts_desc' => $request->desc
        ]);
        $ballot_question_id = $request->quest_id;
        $ballot_id = $request->ballot_id;
        $displayBO = QuesOpt::with('BallotQuestion')->where('ballot_question_id', '=', $request->quest_id)->get();
        return redirect()->back();
    }

    public function FinishAddBO(Request $request)
    {
        $ballot_id = $request->ballot_id;
        $displayBQ = BallotQuestion::where('ballot_id', '=', $request->ballot_id)->get();
        return view('ballotQuestion.AddBallotQuestion', compact('ballot_id', 'displayBQ'));
    }

    public function ViewBO()
    {
        $data = QuesOpt::with('BallotQuestions')->get();
        return view('ballotOption.index', compact('data'));
    }
    public function ViewUpdateBO($id)
    {
        $data = QuesOpt::find($id);
        return view('ballotOption.UpdateBallotOption', compact('data'));
    }

    public function UpdateBO(Request $request)
    {
        $this->validate($request, [
            'photo' => 'required',
            'option' => 'required',
            'desc' => 'required'
        ]);
        $photo = $request->file('photo')->getClientOriginalName();
        $request->file('photo')->move('images', $photo);

        QuesOpt::find($request->id)->update([
            'option' => $request->option,
            'photo' => $photo,
            'opts_desc' => $request->desc
        ]);
        $ballot_question_id = $request->quest_id;
        $ballot_id = BallotQuestion::find($ballot_question_id)->first('ballot_id')->toArray();
        $ballot_id = $ballot_id['ballot_id'];

        $displayBO = QuesOpt::with('BallotQuestion')->where('ballot_question_id', '=', $request->quest_id)->get();
        return redirect()->route('BO', $ballot_question_id)->with('update', 'Update Succccccessfully');
    }

    function delete(Request $request)
    {
        QuesOpt::destroy($request->id);
        return redirect()->back();
    }
}
