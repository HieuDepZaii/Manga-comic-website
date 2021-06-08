<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [\App\Http\Controllers\DungChungController::class,'trangChu'])->name('trangChu');
//admin-route
Route::get('admin/form-ds-user',[\App\Http\Controllers\UserController::class,'formDSUser'])->name('admin.formDSUser');
Route::delete('admin/delete-user/{id}',[\App\Http\Controllers\UserController::class,'xoaUser'])->name('admin.xoaUser');
Route::get('admin/form-add-category',[\App\Http\Controllers\CategoryController::class,'formAddCategory'])->name('admin.formAddCategory');
Route::post('admin/add-category',[\App\Http\Controllers\CategoryController::class,'addCategory'])->name('admin.addCategory');
Route::get('admin/ds-the-loai',[\App\Http\Controllers\CategoryController::class,'xemDSTheLoai'])->name('admin.xemDSTheLoai');
Route::delete('/delete-category/{id}',[\App\Http\Controllers\CategoryController::class,'deleteCategory'])->name('admin.deleteCategory');
Route::post('/edit-category/{id}',[\App\Http\Controllers\CategoryController::class,'editCategory'])->name('adim.editCategory');
//tác giả route
Route::get('tac-gia/form-dang-truyen',[\App\Http\Controllers\CommicController::class,'formDangTruyen'])->name('tacgia.formDangTruyen');
Route::post('tac-gia/add-comic',[\App\Http\Controllers\CommicController::class,'addComic'])->name('tacgia.addComic');
Route::get('tac-gia/xem-ds-truyen',[\App\Http\Controllers\CommicController::class,'xemDSTruyen'])->name('tacgia.xemDSTruyen');
Route::delete('tac-gia/xoa-truyen/{id}',[\App\Http\Controllers\CommicController::class,'xoaTruyen'])->name('tacgia.xoaTruyen');
Route::get('tac-gia/form-sua-truyen/{id}',[\App\Http\Controllers\CommicController::class,'formChinhSuaTruyen'])->name('tacgia.formChinhSuaTruyen');
Route::post('tac-gia/edit-truyen/{id}',[\App\Http\Controllers\CommicController::class,'editTruyen'])->name('tacgia.editTruyen');
Route::get('tac-gia/xem-ds-chapters/{id}',[\App\Http\Controllers\ChapterController::class,'xemDSChapter'])->name('tacgia.xemDSChapter');
Route::get('tac-gia/form-add-chapters',[\App\Http\Controllers\ChapterController::class,'formAddChapter'])->name('tacgia.formAddChapter');
Route::post('tac-gia/add-chapters',[\App\Http\Controllers\ChapterController::class,'addChapter'])->name('tacgia.addChapter');
Route::delete('tac-gia/delete-chapters/{comic_id}/{chapter_id}',[\App\Http\Controllers\ChapterController::class,'deleteChapter'])->name('tacgia.deleteChapter');
Route::get('tac-gia/form-edit-chapters/{comic_id}/{chapter_id}',[\App\Http\Controllers\ChapterController::class,'formEditChapter'])->name('tacgia.formEditChapter');
Route::post('tac-gia/edit-chapters/{chapter_id}',[\App\Http\Controllers\ChapterController::class,'editChapter'])->name('tacgia.editChapter');
//dùng chung
Route::get('/xem-truyen/{id}',[\App\Http\Controllers\DungChungController::class,'xemTruyen'])->name('xemTruyen');
Route::get('/xem-truyen/{comic_id}/{chapter_id}',[\App\Http\Controllers\DungChungController::class,'formXemChapter'])->name('xemChapter');
//comment
Route::post('/comment/{comic_id}/{user_id}',[\App\Http\Controllers\CommentController::class,'uploadComment'])->name('uploadComment');

//tim kiem
Route::get('/search/{comic_name}',[\App\Http\Controllers\TimKiemController::class,'SearchComics'])->name('searchComics');

//người dùng
Route::get('/user/form-chinh-sua/{id}',[\App\Http\Controllers\NguoiDungController::class,'formChinhSua'])->name('user.formChinhSua');
Route::post('/user/chinh-sua-thong-tin/{id}',[\App\Http\Controllers\NguoiDungController::class,'suaThongTinCaNhan'])->name('user.suaThongTinCaNhan');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['middleware' => ['auth','admin']], function () {
    Route::get('admin-view', [\App\Http\Controllers\HomeController::class,'adminView'])->name('admin.view')->middleware('admin');
});
