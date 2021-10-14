<?php

namespace App\Http\Controllers;

use App\Events\StartElection;
use App\Models\QuestionVoter;
use App\Models\voter;
use App\Rules\FullName;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class VoterController extends Controller
{
    public $unique_id;
    public $unique_key;

    public function create($id)
    {
        $election_id = $id;
        return view('voter/create', compact('election_id'));
    }
    public function addvoter(Request $req)
    {
        $req->validate([
            'voter_nm' => ['required', new FullName],
            'email' => 'required | email | unique:voters,email',
            'valid_id' => 'nullable',
            'phone_num' => 'required | unique:voters,phone_num',
        ], [
            'voter_nm.required' => 'Voter Name is required.',
            'email.required' => 'Email is required.',
            'phone_num.required' => 'Phone Number is required.',
            'voter_nm.unique' => 'Voter Name already exist.',
            'email.unique' => 'Email already exist.',
            'phone_num.unique' => 'Phone Number already exist.'
        ]);

        // Check if the auto generated unique id is already in the database
        $this->unique_id_check($req->voter_nm);
        $voter = voter::create([
            'election_id' => $req->election_id,
            'voter_nm' => $req->voter_nm,
            'email' => $req->email,
            'valid_id' => $req->valid_id,
            'unique_id' => $this->unique_id,
            'unique_key' => $this->unique_key,
            'phone_num' => $req->phone_num
        ]);

        event(new StartElection($voter));

        // DB::beginTransaction(function () use ($req) {

        //     voter::create([
        //         'voter_nm' => $req->voter_nm,
        //         'email' => $req->email,
        //         'valid_id' => $req->valid_id,
        //         'unique_id' => $this->unique_id,
        //         'unique_key' => $this->unique_key,
        //         'phone_num' => $req->phone_num
        //     ]);

        // $message = "Click the link below and enter your credentials to begin voting \nUnique Id: $this->unique_id \nUnique Key: $this->unique_key \n";
        // $twilio = new TwilioController();
        // $twilio->sendSMS($req->phone_num, $message);

        //     try {
        //         voter::create([
        //             'voter_nm' => $req->voter_nm,
        //             'email' => $req->email,
        //             'valid_id' => $req->valid_id,
        //             // 'unique_id' => $req->unique_id,
        //             // 'unique_key' => $req->unique_key,
        //             'unique_id' => $this->unique_id,
        //             'unique_key' => $this->unique_key,
        //             'phone_num' => $req->phone_num
        //         ]);

        //         $message = "Click the link below and enter your credentials to begin voting \nUnique Id: $this->unique_id \nUnique Key: $this->unique_key \n";
        //         $twilio = new TwilioController();
        //         $twilio->sendSMS($req->phone_num, $message);


        //         voter::commit();
        //         // all good
        //     } catch (\Exception $e) {
        //         voter::rollback();
        //         return redirect()->back()->with('error', 'Failed to add voter: ' . $e);
        //     }
        // });


        return redirect()->back()->with('Success', 'Voter Added');
    }

    private function unique_id_check($voter_nm)
    {
        $name_array = explode(' ', $voter_nm);
        $prefix = $name_array[1][0] . $name_array[0][0];

        $this->unique_id = $prefix .
            substr(md5(microtime()), rand(0, 26), 6);
        $this->unique_key = uniqid();

        if (voter::where('unique_id', $this->unique_id)->count() > 0) {
            $this->unique_id_check($voter_nm);
        }
    }

    public function view()
    {
        $voters = voter::all();
        return view('voter/view', compact('voters'));
    }

    public function edit($id)
    {
        $voter = voter::find($id);

        return view('voter/edit', compact('voter'));
    }

    public function update(Request $req)
    {

        voter::find($req->id)->update([
            'voter_nm' => $req->voter_nm,
            'email' => $req->email,
            'valid_id' => $req->valid_id,
            'unique_id' => $req->unique_id,
            'unique_key' => $req->unique_key,
            'phone_num' => $req->phone_num
        ]);

        return redirect()->back()->with('Success', 'Voter Updated');
    }

    public function delete($id)
    {
        voter::destroy($id);
        return redirect()->back()->with('Success', 'Voter Deleted');
    }

    public function importVotersForm($election_id)
    {
        return view('voter.importVoter', compact('election_id'));
    }

    public function importVoters(Request $req)
    {
        $req->validate([
            'v_file' => 'required|mimes:xml,csv',
        ]);

        $file = fopen($req->v_file, "r");

        // Skip first line
        fgetcsv($file, 0, ",");
        while (($voter = fgetcsv($file, 0, ",")) !== FALSE) {

            $this->unique_id_check($voter[0]);

            $voters = array(
                'election_id' => $req->election_id,
                'voter_nm' => $voter[0],
                'email' => $voter[1],
                'valid_id' => $voter[2],
                'unique_id' => $this->unique_id,
                'unique_key' => $this->unique_key,
                'phone_num' => $voter[3]
            );


            $check_email = Voter::where("email", "=", $voter[1])->first();
            $check_phone = Voter::where("valid_id", "=", $voter[2])->first();
            $check_valid_id = Voter::where("phone_num", "=", $voter[3])->first();

            if (!is_null($check_email)) {
                $update_voter   =       Voter::where("email", "=", $voter[1])->update($voters);
                if ($update_voter == true) {
                    $status = "success";
                    $message = "Voters list updated successfully";
                }
            } elseif (!is_null($check_phone)) {
                $update_voter   =       Voter::where("phone_num", "=", $voter[3])->update($voters);
                if ($update_voter == true) {
                    $status = "success";
                    $message = "Voters list updated successfully";
                }
            } elseif (!is_null($check_valid_id)) {
                $update_voter = Voter::where("valid_id", "=", $voter[2])->update($voters);
                if ($update_voter == true) {
                    $status = "success";
                    $message = "Voters list updated successfully";
                }
            } else {
                $voter_entry = Voter::create($voters);
                if (!is_null($voter_entry)) {
                    $status = "success";
                    $message = "Voters list imported successfully";
                }
            }
        }

        return redirect()->route('ViewVoterIndex')->with($status, $message);
    }

    public function voterLogin()
    {
        return view('voter.login');
    }

    public function voterAuth(Request $request)
    {
        $request->validate([
            'unique_id' => 'required',
            'unique_key' => 'required',
        ]);

        $credentials = $request->only('unique_id', 'unique_key');
        $voter = Voter::where('unique_id', $request->unique_id)
            ->where('unique_key', $request->unique_key)->first();
        if ($voter) {
            // session(['election_id' => $voter->election_id]);

            return redirect()->route('election.answer', $voter->election_id)
                ->with('success', 'Happy Voting');
        }

        return redirect("voter/login")->with('error', 'Login details are not valid');
    }
}
