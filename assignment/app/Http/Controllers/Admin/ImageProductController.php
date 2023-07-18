<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ImageProductRequest;
use App\Models\image_product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class ImageProductController extends Controller
{
    //
    public function list($id){
        $data = DB::table('image_products')
            ->where('id_product', '=', $id)
            ->orderBy('id', 'asc')
            ->get();
        return view('admin.image.list', compact('data'));
    }
    public function edit(ImageProductRequest $request, $id){
        $title = 'Edit Image Product ID: '.$id;
        $image = DB::table('image_products')->where('id', $id)->first();
        if ($request->post()){
            $data = image_product::find($id);
            if ($request->hasFile('upload')){
                $imagePath = $request->file('upload')->store('images', 'public');
                $data->image = $imagePath;
            }
            $data->save();
            return redirect()->route('image.list', [$image->id_product])->with('success','Cập nhật thành công');
        }

        return view('admin.image.edit', compact('title', 'image'));
    }
}
