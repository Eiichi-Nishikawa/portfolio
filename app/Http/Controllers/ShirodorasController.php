<?php

namespace App\Http\Controllers;

use App\Category;
use App\shirodora;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ShirodorasController extends Controller
{
    public function welcome(){
        return view('shirodoras.welcome');
    }

    public function home(Request $request)
    {
        $count = Shirodora::all();
        $shirodoras = Shirodora::all();
        $shirodoras = Shirodora::Paginate(3);
         //Categoryモデルを定義して、getLists関数でcategoryテーブルのidとnameカラムを取得
         $category = new Category;
         $categories = $category->getLists();
         $categoryId = $request->input('category_id');
 
         return view('shirodoras.home',[
             'shirodoras' => $shirodoras,
             'count' => $count,
             'categories' => $categories,
             'categoryId' => $categoryId,
         ]);
    }

    public function search(Request $request)
    {
        $shirodoras = Shirodora::all();

        //入力される値nameの中身を定義
        $categoryId = $request->input('category_id');

        $query = Shirodora::query();

        //カテゴリが選択された場合、categoryテーブルからidが一致するrecruitを$queryに代入
        if(isset($categoryId)){
            $query->where('category_id', $categoryId);
        }

        //$queryをcategory_idの昇順に並び替えて$recruitsに代入
        $recruits = $query->orderBy('category_id', 'asc')->paginate(3);

        $category = new Category;
        $categories = $category->getLists();

        return view('shirodoras.searchrecruit', [
            'shirodoras' => $shirodoras,
            'recruits' => $recruits,
            'categories' => $categories,
            'categoryId' => $categoryId,
        ]);
    }

    public function new(Request $request){

        //Categoryモデルを定義して、getLists関数でcategoryテーブルのidとnameカラムを取得
        $category = new Category;
        $categories = $category->getLists();
        $categoryId = $request->input('categoryId');

        return view('shirodoras.new',[
            'categories' => $categories,
            'categoryId' => $categoryId
        ]);
    }

    public function create(Request $request){

        $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|integer|nullable',
            'comment' => 'nullable|string|max:255',
            'user_id' => 'integer',
        ]);
        $shirodora = new shirodora;
        
        Auth::user()->shirodoras()->save($shirodora->fill($request->all()));

        return redirect('/shirodoras/new')->with('flash_message', ('登録しました'));

    }

    public function edit(Request $request, $id){
        //GETパラメーターが数字かどうかチェックする
        if(!ctype_digit($id)){
            return redirect('/shirodoras/new')->with('flash_message', ('不正な操作が行われました') );
        }

        $shirodora = Auth::user()->shirodoras()->find($id);
        $category = new Category;
        $categories = $category->getLists();
        $categoryId = $request->input('categoryId');
        

        return view('shirodoras.edit',[
            'shirodora' => $shirodora,
            'categories' => $categories,
            'categoryId' => $categoryId
        ]);

    }

    public function update(Request $request, $id){

        //GETパラメータが数字かどうかチェック
        if(!ctype_digit($id)){
            return redirect('/shirodoras/new')->with('flash_message', ('不正な操作が行われました'));
        }
    
        $shirodora = shirodora::find($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'integer|nullable',
            'comment' => 'nullable|string|max:255',
            'user_id' => 'integer',
        ]);
        
        Auth::user()->shirodoras()->save($shirodora->fill($request->all()));

        return redirect('/shirodoras/new')->with('flash_message', ('編集しました'));
    }

    public function destroy($id)
    {
        //GETパラメータが数字かどうかチェックする
        if(!ctype_digit($id)){
            return redirect('/shirodoras/new')->with('flash_message', ('不正な操作が行われました') );
        }

        Auth::user()->shirodoras()->find($id)->delete();

        return redirect('/shirodoras/mypage')->with('flash_message', ('削除しました') );

        
    }

    public function mypage(){

        $shirodoras = Auth::user()->shirodoras;

        return view('shirodoras.mypage', compact('shirodoras'));

    }

    

    public function detail($id)
    {
        //GETパラメーターが数字かどうかチェックする
        if(!ctype_digit($id)){
            return redirect('/shirodoras/home')->with('flash_message', ('不正な操作が行われました') );
        }

        $shirodora = shirodora::find($id);
        

        return view('shirodoras.detail',[
            'shirodora' => $shirodora,
        ]);
    }
}