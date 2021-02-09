<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Chapter;
use App\Models\Comic;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommicController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function formDangTruyen()
    {
        $category = Category::all();
        $tacgia = User::all();
        return view('tacgia.dangtruyen', ['category' => $category, 'tacgia' => $tacgia]);
    }

    public function addComic(Request $request)
    {
        $comic = new Comic;
        $comic->comic_name = \request('comic_name');
        $comic->category_id = \request('category_id');
        $comic->ma_tac_gia = \request('ma_tac_gia');
        $time1 = explode("/", \request('ngayxb'));
        $ngayxb = $time1[2] . '-' . $time1[1] . '-' . $time1[0];
        $comic->ngayxb = $ngayxb;
        $comic->so_tap = \request('so_tap');
        $comic->mota = \request('mota');
        $get_image = $request->file('anh_bia');
        if ($get_image) {
            $new_image = \request('comic_name') . '-' . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move('upload/comic/anh-bia', $new_image);
            $comic->anh_bia = "upload/comic/anh-bia/$new_image";
        }
        $comic->save();
        return redirect('' . route('tacgia.formDangTruyen') . '')->with('msg', 'đăng truyện thành công');
    }

    public function xemDSTruyen()
    {
        $comic = DB::table('comic')
            ->join('the_loai', 'comic.category_id', '=', 'the_loai.id')
            ->join('users', 'comic.ma_tac_gia', '=', 'users.id')
            ->select('comic.*', 'the_loai.category_name', 'users.name')
            ->get();
        return view('tacgia.DSTruyen', ['comic' => $comic]);
    }

    public function xoaTruyen($id)
    {
        $comic = Comic::findOrFail($id);
        $comic->delete();
        return redirect('' . route('tacgia.xemDSTruyen') . '');
    }

    public function formChinhSuaTruyen($id)
    {
        $category = Category::all();
        $tacgia = User::all();
        $comic = Comic::where('id', $id)->first();
        return view('tacgia.formSuaTruyen', ['comic' => $comic, 'category' => $category, 'tacgia' => $tacgia]);
    }

    public function editTruyen(Request $request, $id)
    {
        $comic = Comic::where('id', $id)->first();
        $comic->comic_name = \request('comic_name');
        $comic->category_id = \request('category_id');
        $comic->ma_tac_gia = \request('ma_tac_gia');
        $time1 = explode("/", \request('ngayxb'));
        $ngayxb = $time1[2] . '-' . $time1[1] . '-' . $time1[0];
        $comic->ngayxb = $ngayxb;
        $comic->so_tap = \request('so_tap');
        $comic->mota = \request('mota');
        $get_image = $request->file('anh_bia');
        if ($get_image) {
            $new_image = \request('comic_name') . '-' . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move('upload/comic/anh-bia', $new_image);
            $comic->anh_bia = "upload/comic/anh-bia/$new_image";
        }
        $comic->save();
        return redirect('' . route('tacgia.formChinhSuaTruyen', ['id' => $id]) . '')->with('msg', 'chỉnh sửa thành công');
    }


}
