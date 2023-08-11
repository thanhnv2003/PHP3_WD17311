<?php

namespace App\Http\Controllers;

use App\Models\image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    //
    public function list(){
        $data = image::all();
        return view('layout.list', compact('data'));
    }
    public function add(Request $request){
        $route = route('upload');
        //kiểm tra nút btn có được nhấn hay không
        if ($request->isMethod('POST')){
            //kiểm tra xem có file ảnh hay không
            if ($request->hasFile('image')){
                //lấy ra file ảnh
                $image = $request->file('image');
                //lấy tên file ảnh
                $imageName = $image->getClientOriginalName();
                //đẩy vào bộ nhớ của máy
                Storage::disk('public')->putFileAs('images', $image, $imageName);
                //thêm dữ liệu len database
                $data_image = new image;
                $data_image->image = $imageName;
                $data_image->save();
            }
            return redirect()->route('list');
        }
        return view('layout.home',compact('route'));
    }
    public function edit(Request $request, $id){
        $route = route('edit',[$id]);
        if ($request->isMethod('POST')){
            if ($request->hasFile('image')){
                //lấy ra file ảnh
                $image = $request->file('image');
                //lấy tên file ảnh
                $imageName = $image->getClientOriginalName();
                // Kiểm tra xem tên tệp đã tồn tại trước khi lưu
                if (Storage::disk('public')->exists('images/' . $imageName)) {
                    // Xóa tệp cũ nếu đã tồn tại
                    Storage::disk('public')->delete('images/' . $imageName);
                }
                //đẩy vào bộ nhớ của máy
                Storage::disk('public')->putFileAs('images', $image, $imageName);
                //cập nhật dữ liệu len database
                $data_image = image::find($id);
                $data_image->image = $imageName;
                $data_image->save();
                return redirect()->route('list');
            }
        }
        return view('layout.home',compact('route'));
    }
}
