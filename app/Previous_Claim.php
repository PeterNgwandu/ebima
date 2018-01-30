<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Previous_Claim extends Model
{
    protected $table = 'previous_claim_tb';

    protected $primaryKey = 'previous_claim_id';

    protected $fillable = [
        'quote_id',
        'cover_type_id',
        'number',
        'amount',
        'years_of_claim'
    ];

}
