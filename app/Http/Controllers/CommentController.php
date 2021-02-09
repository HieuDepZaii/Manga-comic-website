<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function uploadComment($comic_id,$user_id){
        $comment=new Comment();
        $comment->user_id=$user_id;
        $comment->comic_id=$comic_id;
        $comment->comment_content=\request('comment_content');
        $comment->save();
        return redirect(route('xemTruyen',['id'=>$comic_id]));
    }
}
