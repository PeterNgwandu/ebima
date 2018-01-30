<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Motor extends Model
{
    protected $table = 'motor_tb';

    protected $primaryKey = 'motor_id';

    protected $fillable = [
        'quote_id',
        'motor_class_id',
        'registration_no',
        'make',
        'chassis',
        'engine_no',
        'model',
        'body_type',
        'year_of_make',
        'cubic_capacity',
        'date_of_purchase',
        'sum_insured',
        'any_financier',
        'financier_details',
        'is_owner',
        'attached_logbook',
        'owner_details',
        'duty_paid',
        'risk_proposal',
        'vehicle_uses_id',
        'vehicle_uses_details',
        'cover_type_id'
    ];


}
