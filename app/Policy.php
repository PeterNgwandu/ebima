<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Policy extends Model
{
    protected $table = 'policy_tb';

    protected $primaryKey = 'policy_no';

    public $incrementing = false;

    protected $fillable = [
        'policy_no',
        'user_id',
        'issued_date',
        'expire_date',
        'status'
    ];

    public function claim(){
        return $this->hasMany('Api\Models\Claim', 'policy_no', 'policy_no');
    }

    public function user(){
        return $this->hasMany('Api\Models\User', 'user_id', 'user_id');
    }

}
