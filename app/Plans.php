<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plans extends Model
{
    protected $table = 'plan_tb';

    protected $primaryKey = 'plan_id';

    protected $fillable = [
        'names',
        'category_id',
        'icon_name',
        'description',
        'imgsrc',
        'orderby'
    ];

    public $timestamps = false;

    public function category()
    {
        return $this->belongsTo('App\Category', 'category_id', 'category_id');
    }

    public function benefit()
    {
        return $this->hasMany('App\PlanCover', 'plan_id', 'plan_id');
    }

    public function calls()
    {
        return $this->hasMany('App\Calls', 'plan_id', 'plan_id');
    }

}
