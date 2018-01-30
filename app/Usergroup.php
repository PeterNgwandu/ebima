<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usergroup extends Model
{
    protected $table = 'usergroup_tb';

    protected $primaryKey = 'group_id';

    protected $fillable = [
        'names',
        'status'
    ];

    public $timestamps = false;

    public function user()
    {
        return $this->hasMany('Api\Models\User', 'group_id', 'usergroup');
    }

}
