<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function formAddCategory(){
        return view('admin.Category.themTheLoai');
    }
    public function addCategory(){
        $category=new Category;
        $category->category_name=\request('category_name');
        $category->mota=\request('mota');
        $category->save();
        return view('admin.Category.themTheLoai')->with('msg','thêm thể loại thành công');
    }
    public function xemDSTheLoai(){
        $category=Category::all();
        return view('admin.Category.DSTheLoai',['category'=>$category]);
    }
    public function deleteCategory($id){
        $category=Category::findOrFail($id);
        $category->delete();
        return redirect(route('admin.xemDSTheLoai'));
    }
    public function editCategory($id){
        $category=Category::where('id',$id)->first();
        $category->category_name=\request('category_name');
        $category->mota=\request('mota');
        $category->save();
        return redirect(''.route('admin.xemDSTheLoai').'')->with('msg','Cập nhập thành công');
    }
}
