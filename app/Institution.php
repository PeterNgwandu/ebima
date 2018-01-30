<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Institution extends Model
{
    protected $table = 'institution_tb';

    protected $primaryKey = 'institution_id';

    protected $fillable = [
        'name',
        'mobile',
        'email',
        'region_id',
        'district_id',
        'ward_id',
        'location',
        'lat',
        'lon',
        'user_id',
        'type_id',
    ];

    public $timestamps = false;

    public function types()
    {
        return $this->belongsTo('Api\Models\Types', 'type_id');
    }

    public function user()
    {
        return $this->belongsTo('Api\Models\User', 'user_id');
    }

    public function region()
    {
        return $this->belongsTo('Api\Models\Region', 'region_id');
    }

    public function district()
    {
        return $this->belongsTo('Api\Models\District', 'district_id');
    }

    public function ward()
    {
        return $this->belongsTo('Api\Models\Wards', 'ward_id');
    }

}
