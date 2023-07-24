<?php

namespace App\Http\Controllers;

use App\Http\Requests\TestRequest;
use App\Models\tests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Session;

class TestController extends Controller
{
    //
    public function index(Request $request){
//        echo '<h1>Hello World!</h1>';
        $title = 'Test Trang';


//        $data = DB::table('tests')->first();
//        dd($data);
        $data = DB::table('tests')
            ->where('id', '>=',1)
            ->where('id', '<=', 5)
//            ->orWhere('email', '=', 'lauriane53@example.com')
            ->whereNull('deleted_at')
            ->get();
//        dd(DB::table('tests')->get()->sum);
//        $perPage = 10; // Số lượng mục trên mỗi trang
//        $page = tests::paginate($perPage);
//        dd($page->link());



        //kiểm tra khi ton tại là post
        if ($request->post() && $request->email){
            //ấn vào thì nhảy vào đây
            $data = DB::table('tests')
                ->where('email','like','%'.$request->email.'%')
                ->get();
        }
        return view('test.index',compact( 'title','data'));
    }
    public function add(TestRequest $request){
        // nếu như tồn tại repuest post
        if ($request->post()){
//            $value = [
//                'name' => $request->fullname,
//                'email' => $request->email,
//                'address' => $request->address,
//                'date_of_birth' => $request->birthday
//            ];
////            dd($request);
//            DB::table('tests')->insert($value);
            //lấy tất cả dữ liệu trừ token
//            dd($request->except('_token'));
//            die();
            $data = tests::create($request->except('_token'));


//            dd($data);
            if ($data->id){
                Session::flash('success', 'Thêm mới thành công sinh viên');
                return redirect()->route('add');
            }
        }
        return view('test.add');
    }

    public function edit(TestRequest $request, $id){
//        dd($id);
        //cách 1
//        $value = DB::table('tests')->where('id', $id)->get();
        //cách 2
        $value = tests::find($id);
//        dd($value);
        if ($request->post()){
            $data = tests::find($id);
//            $data = tests::updated($request->except('_token'));
            $data->name = $request->name;
            $data->email = $request->email;
            $data->address = $request->address;
            $data->date_of_birth = $request->date_of_birth;
            Session::flash('success', 'Cập nhật thành công sinh viên ID: '.$request->id);
            $data->save();
            return redirect()->route('index');

        }
        return view('test.edit', compact('value'));
    }
    public function delete($id){
        $data = tests::find($id);
        $data->delete();
        return redirect()->route('index');
    }


}
