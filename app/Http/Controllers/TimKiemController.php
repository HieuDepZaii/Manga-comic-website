<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TimKiemController extends Controller
{
    //
    public function SearchComics($comic_name){
        $search_results =DB::select("SELECT * FROM truyentranh.comic where comic_name like ?",['%'.$comic_name.'%']);
//        if(!empty($search_results)){
            return view('SearchResults',['search_results'=>$search_results]);
//        }else{
//            return view('SearchResults',['msg'=>"không có kết quả"]);
//        }
//        return view('SearchResults',['comic_name'=>$comic_name]);
//        echo empty($search_results);

    }
}
