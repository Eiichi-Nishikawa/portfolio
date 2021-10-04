<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class shirodora extends Model
{
    protected $table = 'recruit';

    protected $fillable = ['title', 'category_id', 'comment', 'user_id'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    

}
