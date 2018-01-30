<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    protected $table = 'region_tb';

    protected $primaryKey = 'region_id';

    protected $fillable = [
        'names',
        'country_id',
        'states_id',
        'vmap_id',
        'status'
    ];

    public $timestamps = false;

    public function institution()
    {
        return $this->hasMany('Api\Models\Institution', 'region_id');
    }

    public function district()
    {
        return $this->hasMany('Api\Models\District', 'region_id');
    }

    public function states()
    {
        return $this->belongsTo('Api\Models\States', 'states_id');
    }

    public function country()
    {
        return $this->belongsTo('Api\Models\Country', 'country_id');
    }

}
