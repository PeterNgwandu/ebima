<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category_tb';

    protected $primaryKey = 'category_id';

    protected $fillable = [
        'names',
        'icon_name',
        'description',
        'imgsrc',
        'orderby'

    ];

    public $timestamps = false;

    public function plans()
    {
        return $this->hasMany('App\Plans', 'category_id', 'category_id');
    }
}
