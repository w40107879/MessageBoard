<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Reply;
use App\Msg;
use App\User;
use Auth;

class ReplysController extends Controller
{
    public function reply(){
      return view('msg.reply');
    }

    public function replyindex($id){
      $reply=Reply::get();
      $data['reply'] = $reply;
      $data['id'] = $id;
      return view('msg.replyindex')->with($data);
    }

    public function replyPost(Request $request,$id){
        $reply = new Reply();
        $user = new User();
        $reply->msgs_id = $id;
        $reply->comment_name=Auth::user()->name;
        $reply->content=$request->input('content');
         if($reply->save()){
          return redirect('msg/replyindex/'.$id);
       }else{
        echo '回覆失敗';
        exit();
      }
    }

    public function replyedit(Request $request,$id1,$id2){
        if(empty($_POST)){
          $reply = Reply::find($id2);
          return view('msg.replyedit',['reply'=>$reply]);
        }else{
          $reply = Reply::find($id2); //抓取回覆的id
          $reply->msgs_id = $id1;   //把文章id塞進去
          $reply->comment_name = $request->comment_name;
          $reply->content = $request->content;
          $res=$reply->save();
          if($res){
            return redirect('msg/replyindex/'.$id1);
          }else{
            echo '更新失敗';
          }
        }
    }

    public function replydel($id1,$id2){
      $reply = Reply::find($id2)->delete();
      return redirect('msg/replyindex/'.$id1);
    }
}
