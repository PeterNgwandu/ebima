<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlanCover extends Model
{
    protected $table = 'plan_cover_tb';

    protected $primaryKey = 'plan_cover_id';

    protected $fillable = [
        'plan_id',
        'plan_cost',
        'covering',
        'annual_limit',
        'status',
    ];

    public $timestamps = false;

    public function plans()
    {
        return $this->belongsTo('Api\Models\Plans', 'plan_id', 'plan_id');
    }
}
