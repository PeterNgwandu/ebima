<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table = 'country_tb';

    protected $primaryKey = 'country_id';

    protected $fillable = [
        'names',
        'states_id',
        'status'
    ];

    public $timestamps = false;

    public function states()
    {
        return $this->belongsTo('Api\Models\States', 'states_id');
    }

    public function region()
    {
        return $this->hasMany('Api\Models\Region', 'country_id');
    }

}
