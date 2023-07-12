<?php

namespace App\Http\Controllers;

use App\Http\Requests\TestRequest;
use App\Models\tests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;

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
            $value = [
                'name' => $request->fullname,
                'email' => $request->email,
                'address' => $request->address,
                'date_of_birth' => $request->birthday
            ];
//            dd($request);
            DB::table('tests')->insert($value);
        }
        return view('test.add');
    }

}
