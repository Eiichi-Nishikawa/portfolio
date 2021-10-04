<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';


    //categoryテーブルから::pluckでcategory_nameとidを抽出
    public function getLists()
    {
        $categories = Category::pluck('name', 'id');

        return $categories;
    }

    public function shirodoras()
    {
        return $this->hasMany('App\shirodora');
    }

}
