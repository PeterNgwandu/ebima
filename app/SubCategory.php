<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    protected $table = 'sub_category_tb';

    protected $primaryKey = 'sub_category_id';

    protected $fillable = [
        'category_id',
        'names',
        'icon_name',
        'description',
        'imgsrc',
        'orderby'
    ];

    public $timestamps = false;

    public function plans()
    {
        return $this->hasMany('App\Plans', 'sub_category_id', 'sub_category_id');
    }

    public function category()
    {
        return $this->belongsTo('App\Category', 'category_id', 'category_id');
    }

}
