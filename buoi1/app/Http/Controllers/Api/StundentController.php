<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\tests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class StundentController extends Controller
{
    //
    public function student(Request $request){
//        return response()->json(
//            [[
//           'name' => 'Nguyen Van Thanh',
//           'mark' => 0,
//           'age' => 20
//        ] ,
//            [
//                'name' => 'Nguyen Van Thanh',
//                'mark' => 0,
//                'age' => 20
//            ]],
//        );
        //api truyền vào param để sreach theo tên
//        dd($request->all());

//        $dataStudent = tests::all();
        //validate request API
        //status là 1 chuẩn chung quy định giữa FE và BE
        $validator = Validator::make($request->all(),[
//           'name' => 'required|string',
//            'email' => 'required'
        'limit' => 'required',
            'offset' => 'required'
        ]);

        if ($validator->fails()){
//            return [
//                'status' => 'fails',
//                'errors' => $validator->errors()->toArray()
//            ];
            //dùng status của http code
            return response()->json([
               'errors' => $validator->errors()->toArray()
            ], 400);
        }
        //viết truy vấn sreach gần đúng theo tên
//        $dataSreach = tests::where('name','LIKE','%'.$request->name.'%')->get();
//        return [
//            'status' => 'success',
//            'students' => $dataSreach
//        ];
        $query = DB::table('tests');
            if ($request->name){
                $query->where('name','LIKE','%'.$request->name.'%');
            }
            if ($request->email){
                $query->where('email','LIKE','%'.$request->email.'%');
            }
//            dd($query->toSql());
        $dataStudent = $query->limit($request->limit)
            ->offset($request->offset)
            ->get();
        $queryProduct = DB::table('products');
        if ($request->type){
            if ($request->type == 'price'){
                if ($request->priceMin){
                    dd($request->priceMin);
                }
            }
        }
        $dataProduct = $queryProduct->limit($request->limit)
            ->offset($request->offset)
            ->get();
        return response()->json([
//            'students' => $dataStudent
        'product' => $dataProduct
        ],200);
    }
}
