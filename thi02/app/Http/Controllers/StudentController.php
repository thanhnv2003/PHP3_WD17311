<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentRequest;
use App\Models\Student;
use App\Models\Students;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Session\Session;

class StudentController extends Controller
{
    //
    public function list(){
        $data = Students::all();
        return view('layout.list',compact('data'));
    }
    public function add(StudentRequest $request){
        if ($request->isMethod('POST')){
            $params = $request->except('_token');
            if ($request->hasFile('image') && $request->file('image')->isValid()){
                $image = $request->file('image');
                $imageName = time().'_'.$image->getClientOriginalName();
                Storage::disk('public')->putFileAs('images', $image, $imageName);
                $params['image'] = $imageName;
            }
            $result = Students::create($params);
            if ($result){
                return redirect()->route('list')->with('success', 'Thêm mới thành công');
            }
        }
//        dd(\Illuminate\Support\Facades\Session::get('error'));
        return view('layout.add');
    }
    public function edit(StudentRequest $request,$id){
        $data = Students::find($id);
        if($request->isMethod('POST')){
            $params = $request->all();
            if ($request->hasFile('image') && $request->file('image')->isValid()){
                $deleteImage = Storage::disk('public')->delete('images/'.$data->image);
                if ($deleteImage){
                    $image = $request->file('image');
                    $imageName = time().'_'.$image->getClientOriginalName();
                    Storage::disk('public')->putFileAs('images', $image, $imageName);
                    $params['image'] = $imageName;
                }
            }else{
                $params['image'] = $data->image;
            }
            $result = $data->update($params);
            if ($result){
                return redirect()->route('list')->with('success', 'Cập nhật thành công');
            }
        }
        return view('layout.edit',compact('data'));
    }
    public function delete($id){
        $data = Students::find($id);
        $deleteImage = Storage::disk('public')->delete('images/'.$data->image);
        $data->delete();
        return redirect()->route('list')->with('success', 'Xóa thành công');
    }
}
