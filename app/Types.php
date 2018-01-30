<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Types extends Model
{
    protected $table = 'type_tb';

    protected $primaryKey = 'type_id';

    protected $fillable = [
        'name',
        'status'
    ];

    public $timestamps = false;

    public function institution()
    {
        return $this->hasMany('Api\Models\Institution', 'type_id');
    }

}
