<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\image_product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{
    //
    public function index(){
//        $data_new_arrivals = DB::table('products')->limit(8)->orderBy('updated_at','desc')->get();
        $data_new_arrivals = DB::table('products')->select('id', 'id_brands', 'name', 'image','old_price', 'sale_price')->limit(8)->orderBy('updated_at','desc')->get();
//        dd($data_new_arrivals);
        return view('client.home', compact('data_new_arrivals'));
    }
}
