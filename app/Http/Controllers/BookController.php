<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function list()
    {
        $list = \DB::table('book')->get();
        return response()->json(['message' => '查询成功','data'=>$list]);
    }

    public function get(Request $request){
        $id = $request->input('id');
        $row = \DB::table('book')->where('id','=',$id)->get();
        return response()->json(['message' => '查询单个成功','data'=> $row]);
    }

    public function add(Request $request){
        $name = $request->input('name');
        $author = $request->input('author');
        $price = $request->input('price');
        $id=\DB::table("book")->insertGetId(['name'=>$name ,'author'=>$author,'price'=>$price,'created_at'=>time()]);
        if($id){
            return response()->json(['message' => '添加成功','data'=>$id]);
        }else{
            return response()->json(['message' => '添加失败']);
        }
        
    }
    public function del(Request $request){
        $id = $request->input('id');
        $num=\DB::table("book")->where('id',$id)->delete();
        return response()->json(['message' => '删除成功']);
    }
}
