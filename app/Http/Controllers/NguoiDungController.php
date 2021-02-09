<?php

namespace App\Http\Controllers;

use App\Models\User;
use Hash;
use Illuminate\Http\Request;

class NguoiDungController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth');
    }
    public function formChinhSua($id)
    {
        $nguoidung = User::where('id', $id)->first();
        return view('formChinhSuaThongTin', ['nguoidung' => $nguoidung]);
    }
    public function suaThongTinCaNhan(Request $request, $id)
    {
        try {
            $nguoidung = User::where('id', $id)->first();
            $nguoidung->name = \request('name');
            $nguoidung->email = \request('email');

//            ngày sinh
            $time1 = explode("/", \request('ngay_sinh'));
            $ngaysinh = $time1[2] . '-' . $time1[1] . '-' . $time1[0];
            $nguoidung->ngay_sinh = $ngaysinh;

//            ảnh
            $get_image = $request->file('avatar');
            if ($get_image) {
                $new_image = \request('name') . '-' . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
                $get_image->move('upload/users/avatar', $new_image);
                $nguoidung->avatar = "upload/users/avatar/$new_image";
            } else {
                if (!$nguoidung->avatar) {
                    $nguoidung->avatar = 'img/default-icon/user-2-icon.png';
                }
            }
            if (\request('password')) {

                $nguoidung->password = Hash::make(\request('password'));
            }
//            luu ket qua
            $nguoidung->save();
            $msg_edit = "chỉnh sửa thành công";
        } catch (\Exception $e) {
            $msg_edit = "chỉnh sửa thất bại";
        }
        return redirect(''.route('user.formChinhSua',['id'=>$id]).'' )->with('msg_edit', $msg_edit);
    }
}
