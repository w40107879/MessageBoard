<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Msg;

class InformationController extends Controller
{
    public function index(){
      return Msg::all();
    }

    public function show(Msg $msg)
    {
        return $msg;                          //檢索單筆資料
    }


    public function delete(Msg $msg)
    {
        $msg->delete();

        return response()->json(null, 204);    //資料刪除，回傳204代表動作成功執行不回傳內容
    }
}
