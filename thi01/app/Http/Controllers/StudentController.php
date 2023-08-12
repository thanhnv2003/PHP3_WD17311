<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentRequest;
use App\Models\Students;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    //
    public function list(){
        $data = Students::all();
        return view('layout.list', compact('data'));
    }
    public function add(StudentRequest $request){
        if ($request->isMethod('POST')){
//            $request->validate([
//                'name' => 'required',
//                'gender' => 'required',
//                'phone' => 'required|unique:students,phone',
//                'address' => 'required',
//                'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
//            ]);
            $params = $request->except('_token');
            if ($request->hasFile('image') && $request->file('image')->isValid()){
                $image = $request->file('image');
                $imageName = $image->getClientOriginalName();
                Storage::disk('public')->putFileAs('images', $image, $imageName);
                $params['image'] = $imageName;
            }
            $data = Students::create($params);
            if ($data->id){
                return redirect()->route('list')->with('success', 'Them moi thanh cong');
            }
        }
        return view('layout.add');
    }
    public function edit(Request $request, $id){
        $data = Students::find($id);
        if ($request->isMethod('POST')){
            $params = $request->except('_token');
            if ($request->hasFile('image') && $request->file('image')->isValid()){
                $resultDelete = Storage::disk('public')->delete('images/'.$data->image);
                if ($resultDelete){
                    $image = $request->file('image');
                    $imageName = $image->getClientOriginalName();
                    Storage::disk('public')->putFileAs('images/', $image, $imageName);
                }else{
                    $imageName = $data->image;
                }
                $params['image'] = $imageName;
            }
            $data->update($params);
            return redirect()->route('list');
        }
        return view('layout.edit', compact('data'));
    }
    public function delete($id){
        $data = Students::find($id);
        if (Storage::disk('public')->exists('images/'.$data->image)){
            $resultDelete = Storage::disk('public')->delete('images/'.$data->image);
        }
        $data->delete();
        return redirect()->route('list');
    }
}
