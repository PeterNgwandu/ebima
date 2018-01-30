<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Upload extends Model
{
    protected $table = 'uploadings_tb';

    protected $primaryKey = 'upload_id';

    protected $fillable = [
        'filename',
        'filepath',
        'user_id',
        'post_id',
        'post_type'
    ];

    public function user(){
        return $this->belongsTo('Api\Models\User', 'user_id', 'user_id');
    }

    public function claim(){
        return $this->belongsTo('Api\Models\Claim', 'post_id', 'claims_id');
    }

}
