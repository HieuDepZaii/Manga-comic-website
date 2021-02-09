<?php

namespace App\Http\Controllers;

use App\Models\Chapter;
use App\Models\Comic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChapterController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function xemDSChapter($id){
        $chapter=DB::table('chapter')->where('comic_id',$id)->get();
        $comic=Comic::where('id',$id)->first();
        return view('tacgia.DSChapter',['chapter'=>$chapter,'comic'=>$comic]);
    }
    public function formAddChapter(){
        $comic=Comic::all();
        return view('tacgia.formAddChapter',['comic'=>$comic]);
    }
    public function addChapter(Request $request){
        $chapter=new Chapter();
        $chapter->chapter_name=\request('chapter_name');
        $chapter->chapter_number=\request('chapter_number');
        $chapter->comic_id=\request('comic_id');
        $time1 = explode("/", \request('upload_date'));
        $upload_date = $time1[2] . '-' . $time1[1] . '-' . $time1[0];
        $chapter->upload_date = $upload_date;
        $comic=Comic::where('id',\request('comic_id'))->first();
        error_log($comic);
        if($request->hasFile('image_content')){
            $count=0;
            foreach ($request->file('image_content') as $file){
                $name='upload/chapter/images/'.$comic->comic_name.'-'.\request('chapter_number').'-'.$count.'.'.$file->extension();
                $file->move('upload/chapter/images',$name);
                $data[]=$name;
                $count++;
            }
            $chapter->image_content=json_encode($data);
        }

        $chapter->save();
        return redirect(''.route('tacgia.formAddChapter').'')->with('msg','upload chapter thành công');
    }
    public function deleteChapter($comic_id,$chapter_id){
        $chapter=Chapter::findOrFail($chapter_id);
        $chapter->delete();
        return redirect(''.route('tacgia.xemDSChapter',['id'=>$comic_id]));
    }
    public function formEditChapter($comic_id,$chapter_id){
        $comic=Comic::where('id',$comic_id)->first();
        $chapter=Chapter::where('id',$chapter_id)->first();
        return view('tacgia.suaChapter',['comic'=>$comic,'chapter'=>$chapter]);
    }
    public function editChapter(Request $request, $chapter_id){
        $chapter=Chapter::where('id',$chapter_id)->first();
        $chapter->chapter_name=\request('chapter_name');
        $chapter->chapter_number=\request('chapter_number');
        $time1 = explode("/", \request('upload_date'));
        $upload_date = $time1[2] . '-' . $time1[1] . '-' . $time1[0];
        $chapter->upload_date = $upload_date;
        $comic=Comic::where('id',$chapter->comic_id)->first();
        error_log($comic);

        if($request->hasFile('image_content')){
            $count=0;
            foreach ($request->file('image_content') as $file){
                $name='upload/chapter/images/'.$comic->comic_name.'-'.\request('chapter_number').'-'.$count.'.'.$file->extension();
                $file->move('upload/chapter/images',$name);
                $data[]=$name;
                $count++;
            }
            $chapter->image_content=json_encode($data);
        }

        $chapter->save();
        return redirect(''.route('tacgia.formEditChapter',['comic_id' => $chapter->comic_id,'chapter_id'=>$chapter->id]).'')->with('msg','chỉnh sửa thành công');
    }

}
