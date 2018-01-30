<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    protected $table = 'quote_tb';

    protected $primaryKey = 'quote_id';

    protected $fillable = [
        'category_id',
        'subcategory_id',
        'plan_id',
        'fname',
        'lname',
        'dob',
        'sex_id',
        'mobile',
        'email',
        'region_id',
        'district_id',
        'quote_status'
    ];

}
