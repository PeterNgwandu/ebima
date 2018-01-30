<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Calls extends Model
{
    protected $table = 'callme_tb';

    protected $primaryKey = 'callme_id';

    protected $fillable = [
        'category_id',
        'plan_id',
        'fname',
        'lname',
        'mobile',
        'email',
        'region_id',
        'district_id',
        'status',
    ];

    public $timestamps = false;

    public function category()
    {
        return $this->belongsTo('App\Category', 'category_id');
    }

    public function plan()
    {
        return $this->belongsTo('App\Plans', 'plan_id');
    }

    public function region()
    {
        return $this->belongsTo('App\Region', 'region_id');
    }

    public function district()
    {
        return $this->belongsTo('App\District', 'district_id');
    }

    public function reason()
    {
        return $this->hasMany('App\Reason', 'reason_id', 'reason_id');
    }

}
