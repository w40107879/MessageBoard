<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\Msg;
use App\User;
use Auth;
class MsgsController extends Controller
{
    public function add(){
        return view('msg.add');
    }

	public function addPost(Request $request){
        $msg = new Msg();
        $user = new User();
        $msg->name = Auth::user()->name;
        $msg->title=$request->input(['title']);
        $msg->content=$request->input(['content']);
        if($msg->save()){
            return redirect('msg/index');
        }else{
            echo '添加失敗';
            exit();
        }
	}

	public function index(){
        $msg = Msg::get();
        $user = User::get();
        $data['msg'] = $msg;
        $data['name'] = $user;
        return view('msg.index')->with($data);
    }

	public function del($id){
        $res=Msg::find($id)->delete();
        if ($res) {
           return redirect('msg/index');
        }else{
            echo '删除失败';
        }
    }

	public function edit(Request $request,$id){
        if (empty($_POST)) {
            $msg = Msg::find($id);
            return view('msg.edit',['msg'=>$msg]);
        }else{
            $msg = Msg::find($id);
            $msg->name = Auth::user()->name;
            $msg->title = $request->title;
            $msg->content = $request->content;
            $res=$msg->save();
            if ($res) {
           return redirect('msg/index');
        }else{
            echo '更新失败 ';
           }
        }
    }
}
