<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $table = 'district_tb';

    protected $primaryKey = 'district_id';

    protected $fillable = [
        'names',
        'region_id',
        'status'
    ];

    public $timestamps = false;

    public function institution()
    {
        return $this->hasMany('Api\Models\Institution', 'district_id');
    }

    public function wards()
    {
        return $this->hasMany('Api\Models\Wards', 'district_id');
    }

    public function region()
    {
        return $this->belongsTo('Api\Models\Region', 'region_id');
    }

}
