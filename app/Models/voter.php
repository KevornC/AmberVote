<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voter extends Model
{
    use HasFactory;

    protected $fillable = [
        'election_id',
        'voter_nm',
        'email',
        'valid_id',
        'unique_id',
        'unique_key',
        'phone_num'
    ];

    public function questionVoter()
    {
        return $this->belongsTo(QuestionVoter::class);
    }
}
