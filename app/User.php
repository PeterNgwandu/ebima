<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'user_tb';


    protected $primaryKey = 'user_id';

    /**
     *
     *   Set created_time and updated_time to false
     *
     *   @var bool
     */

    protected $fillable = [
        'fname',
        'lname',
        'mobile',
        'email',
        'dob',
        'sex',
        'username',
        'password',
        'usergroup',
        'base64user',
        'is_gateway',
        'activation_status',
        'status',
    ];

    protected $hidden = array('password', 'username', 'base64user');

    public $timestamps = false;

    public function usergroups()
    {
        return $this->belongsTo('Api\Models\Usergroup', 'usergroup', 'group_id');
    }

    public function institution()
    {
        return $this->hasMany('Api\Models\Institution', 'user_id');
    }

    public function upload(){
        return $this->hasMany('Api\Models\Upload', 'user_id', 'user_id');
    }

}
