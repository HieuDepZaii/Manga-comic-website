<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Chapter;
use App\Models\Comic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DungChungController extends Controller
{
    public function trangchu()
    {
        $comic = DB::table('comic')->join('the_loai','comic.category_id','the_loai.id')
            ->join('users','users.id','comic.ma_tac_gia')->select('comic.*','the_loai.category_name','users.name')->get();
        $category=Category::all();
        return view('trangchu', ['comic' => $comic,'category' =>$category]);
    }
    public function xemTruyen($id)
    {
        $comic = DB::table('comic')->select('comic.*', 'the_loai.category_name','users.name')
            ->join('the_loai', 'comic.category_id', 'the_loai.id')
            ->join('users','users.id','comic.ma_tac_gia')
            ->where('comic.id', $id)->first();
        $chapter = Chapter::where('comic_id', $id)->get();
        $comment=DB::table('comment')->select('comment.*', 'users.name','users.avatar')
            ->join('users','comment.user_id','users.id')->where('comment.comic_id', $id) ->get();
        $category=Category::all();
        return view('xem-truyen', ['comic' => $comic, 'chapter' => $chapter,'comment'=>$comment,'category'=>$category]);
    }
    public function formXemChapter($comic_id, $chapter_id)
    {
        $category=Category::all();
        $chapter_all=Chapter::where('comic_id', $comic_id)->get();
        $comic = Comic::where('id', $comic_id)->first();
        $chapter = Chapter::where('id', $chapter_id)->first();
        $content_images = $chapter->image_content;
        $imgdata = json_decode($content_images, true);
//        print_r($imgdata);
        return view('xem-chapter', ['comic' => $comic, 'chapter' => $chapter, 'imgdata' => $imgdata,'chapter_all'=>$chapter_all,'category'=>$category]);
    }
}
