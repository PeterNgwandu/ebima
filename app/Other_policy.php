<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Other_policy extends Model
{
    protected $table = 'other_policy_tb';

    protected $primaryKey = 'other_policy_id';

    protected $fillable  = [
        'quote_id',
        'company',
        'period',
        'policy_no',
        'any_claim_bonus',
        'claim_certificate',
        'declined',
        'withdrawn',
        'increase_rate_charged',
        'special_restriction',
        'principal_driver_name',
        'age',
        'driving_duration',
        'date_licensed',
        'license_no',
    ];
}
