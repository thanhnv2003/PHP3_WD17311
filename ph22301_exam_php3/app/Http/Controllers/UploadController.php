<?php

namespace App\Http\Controllers;

use App\Models\image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    //
    public function list(){
//        dd(Session::get('success'));
        $data = image::all();
        return view('layout.list', compact('data'));
    }
    public function add(Request $request){

        $route = route('upload');
        //kiểm tra nút btn có được nhấn hay không
        if ($request->isMethod('POST')){
            //validate cho ảnh
            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
            ]);
            //kiểm tra xem có file ảnh hay không
            if ($request->hasFile('image') && $request->file('image')->isValid()){
                //lấy ra file ảnh
                $image = $request->file('image');
                //lấy tên file ảnh
                $imageName = $image->getClientOriginalName();
                //đẩy vào bộ nhớ của máy
                Storage::disk('public')->putFileAs('images', $image, $imageName);
                //thêm dữ liệu len database
                $data_image = new image;
                $data_image->image = $imageName;
                $result = $data_image->save();
                return redirect()->route('list')->with('success', 'Thêm mới thành công');
            }
            return redirect()->route('add')->with('error', 'No Image');
        }
        return view('layout.home',compact('route'));
    }
    public function edit(Request $request, $id){
        $route = route('edit',[$id]);
        //lấy lại data cũ trên db để kiểm tra
        $data_image = image::find($id);
        //kiểm tra nút bấm có được nhấn
        if ($request->isMethod('POST')){
                // kiểm tra nếu có file ảnh
                if($request->hasFile('image') && $request->file('image')->isValid()){
                    //xóa ảnh cũ ở máy
                    $resultDelete = Storage::disk('public')->delete('images/'. $data_image->image);
                    //nếu xóa thành công thì cập nhật ảnh mới
                    if ($resultDelete){
                        //lấy ra file ảnh
                        $image = $request->file('image');
                        //lấy tên file ảnh
                        $imageName = $image->getClientOriginalName();
                        //đẩy vào bộ nhớ của máy
                        Storage::disk('public')->putFileAs('images', $image, $imageName);
                    }
                    //ngược lại nếu không có file ảnh mới thì lấy lại ảnh cũ
                }else{
                    $imageName = $data_image->image;
                }
                //cập nhật dữ liệu len database
                $data_image->image = $imageName;
                $data_image->save();
                return redirect()->route('list');
        }
        return view('layout.home',compact('route'));
    }
    public function delete($id){
        $data = image::find($id);
        //xóa ảnh ra khỏi máy
        $result = Storage::disk('public')->delete('images/'. $data->image);
        //xóa trên db theo id
        DB::table('images')->where('id','=',$id)->delete();
        if ($result){
            return redirect()->route('list')->with('success', 'Xóa dữ liệu và ảnh trong máy thành công');
        }else{
            return redirect()->route('list')->with('success', 'Xóa dữ lieu thanh cong');
        }
    }
}
