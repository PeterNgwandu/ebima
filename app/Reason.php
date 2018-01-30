<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reason extends Model
{
    protected $table = 'callme_reason_tb';

    protected $primaryKey = 'reason_id';

    protected $fillable = [
        'reason',
        'status'
    ];

    public $timestamps = false;

    public function calls()
    {
        return $this->hasMany('Api\Models\Calls', 'reason_id', 'reason_id');
    }

}
