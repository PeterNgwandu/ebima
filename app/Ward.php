<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ward extends Model
{
    protected $table = 'ward_tb';

    protected $primaryKey = 'ward_id';

    protected $fillable = [
        'names',
        'district_id',
        'status'
    ];

    public $timestamps = false;

    public function institution()
    {
        return $this->hasMany('Api\Models\Institution', 'ward_id');
    }

    public function district()
    {
        return $this->belongsTo('Api\Models\District', 'district_id');
    }

}
