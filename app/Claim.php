<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Claim extends Model
{
    protected $table = 'claims_tb';

    protected $primaryKey = 'claims_id';

    protected $fillable = [
        'fname',
        'lname',
        'mobile',
        'email',
        'region_id',
        'district_id',
        'category_id',
        'sub_category_id',
        'plan_id',
        'policy_no',
        'status'
    ];

    public function upload(){
        return $this->hasMany('App\Upload', 'post_id', 'claims_id');
    }

    public function claimstatus(){
        return $this->hasMany('App\Claimstatus', 'claims_id', 'claims_id');
    }

    public function region_id(){
        return $this->hasMany('App\Region', 'region_id', 'region_id');
    }

    public function district_id(){
        return $this->hasMany('App\District', 'district_id', 'district_id');
    }

    public function category_id($value=''){
        return $this->hasMany('Api\Models\Category', 'category_id', 'category_id');
    }

    public function sub_category_id($value=''){
        return $this->hasMany('Api\Models\Category', 'sub_category_id', 'sub_category_id');
    }

    public function plan_id($value=''){
        return $this->hasMany('Api\Models\Plan', ' plan_id', 'plan_id');
    }

    public function policy_no($value=''){
        return $this->belongsTo('Api\Models\Plan', ' policy_no', 'policy_no');
    }


}
