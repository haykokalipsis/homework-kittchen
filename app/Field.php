<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    protected $guarded = [];
    public $timestamps = false;

    public function categories()
    {
        return $this->belongsToMany('App\Category');
    }

    public function products()
    {
        return $this->belongsToMany('App\Product', 'product_field')
            ->withPivot(['title', 'value']);
    }
}
