<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\Msg;
use App\Reply;
use App\User;
use Auth;

class MsgsController extends Controller
{
  public function __construct() {
       $this->middleware('auth');
   }

    public function add(){
        return view('msg.add');
    }
    public function uplode(){
        return view('msg.uplode');
    }

	public function addPost(Request $request){
        $msg = new Msg();
        $user = new User();
        $msg->name = Auth::user()->name;
        $msg->NumReply=0;
        $msg->title=$request->input('title');
        $msg->content=$request->input('content');
        if($msg->save()){
            return redirect('msg/index'
          );
        }else{
            echo '添加失敗';
            exit();
        }
	}

	public function index(){
        $msg = Msg::get();
        $user = User::get();
        $reply = Reply::get();
        $data['reply'] = $reply;
        $data['msg'] = $msg;
        $data['name'] = $user;
        return view('msg.index')->with($data);
    }

	public function del($id){
        $res = Msg::find($id)->delete();
        if ($res) {
           return redirect('msg/index');
        }else{
            echo '刪除失敗';
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
            echo ' ';
           }
        }
    }
  public function uploadPicture(){
    if(isset($_POST['uploadprofileimg'])){
        $image = base64_encode(file_get_contents($_FILES['profileimg']['tmp_name']));

        $options = array('http'=>array(
            'method'=>"POST",
            'header'=>"Authorization: Bearer 52e2ae50cd89c2e1c60f734476fffe0503f6324d\n".
            "Content-Type:application/x-www-form-urlencode",
            'content'=>$image,
        ));
        $context = stream_context_create($options);

        $imgurURL = "https://api.imgur.com/3/image";

        $response = file_get_contents($imgurURL,false,$context);
        $response = json_decode($response);

    }
    return redirect('msg/index');
  }
}
