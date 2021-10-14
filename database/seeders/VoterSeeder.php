<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Voter;

class VoterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Voter1 = [
            [
                'election_id' => 1,
                'voter_nm' => 'Kevorn Callum',
                'email' => 'kevorn.callum16@gmail.com',
                'valid_id' => '123-987-456',
                'unique_id' => 'KCV1',
                'unique_key' => 'KCKEY',
                'phone_num' => '876-987-4321'
            ]
        ];

        $Voter2 = [
            [
                'election_id' => 1,
                'voter_nm' => 'Shaneika Lewis',
                'email' => 'amberstudentneika@gmail.com',
                'valid_id' => '123-977-456',
                'unique_id' => 'SLV1',
                'unique_key' => 'SLKEY',
                'phone_num' => '876-917-4321'
            ]
        ];

        $Voter3 = [
            [
                'election_id' => 1,
                'voter_nm' => 'Richard Wilson',
                'email' => 'Richard.Wilson@gmail.com',
                'valid_id' => '123-987-416',
                'unique_id' => 'RWV1',
                'unique_key' => 'RWKEY',
                'phone_num' => '876-987-4921'
            ]
        ];

        $Voter4 = [
            [
                'election_id' => 2,
                'voter_nm' => 'Latoya Jackson',
                'email' => 'jacksonlatoya04@gmail.com',
                'valid_id' => '113-987-456',
                'unique_id' => 'LJV1',
                'unique_key' => 'LJKEY',
                'phone_num' => '876-887-4321'
            ]
        ];

        $Voter5 = [
            [
                'election_id' => 2,
                'voter_nm' => 'Patrick Virgo',
                'email' => 'Patrick.Virgo@gmail.com',
                'valid_id' => '123-987-856',
                'unique_id' => 'PVV1',
                'unique_key' => 'PVKEY',
                'phone_num' => '876-987-4331'
            ]
        ];

        foreach ($Voter1 as $key => $val) {
            Voter::create($val);
        }


        foreach ($Voter2 as $key => $val) {
            Voter::create($val);
        }


        foreach ($Voter3 as $key => $val) {
            Voter::create($val);
        }


        foreach ($Voter4 as $key => $val) {
            Voter::create($val);
        }

        foreach ($Voter5 as $key => $val) {
            Voter::create($val);
        }
    }
}
