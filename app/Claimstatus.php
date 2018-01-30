<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Claimstatus extends Model
{
    protected $table = 'claims_status_tb';

    protected $primaryKey = 'claims_id';

    protected $fillable = [
        'user_id',
        'claims_summary',
        'claims_detail',
        'status'
    ];

    public function claim(){
        return $this->belongsTo('App\Claim', 'claims_id', 'claims_id');
    }

}
