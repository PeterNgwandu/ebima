<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quote_Premium extends Model
{
    protected $table = 'quote_premium_tb';

    protected $primaryKey = 'quote_premium_id';

    protected $fillable = [
        'quote_id',
        'sub_total',
        'vat',
        'grand_total',
        'policy_no',
        'insurance_start',
        'insurance_ends'
    ];
}
