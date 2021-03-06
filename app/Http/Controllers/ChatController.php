<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use App\Events\NewMessageAdded;
use App\User;
use App\Posts;

class ChatController extends Controller
{
	
	public function Index(){
		$posts = Posts::all();
		return view('welcome', ['posts' => $posts]);
    }
	
	public function Livecomments($id){
		$posts = Posts::find($id);
		$messages = Message::where('post_id', '=', $id)->get();	
		return view('livecomments', ['messages' => $messages, 'id' => $id, 'posts' => $posts]);
    }
	
    public function Chat(){
		$messages = Message::all();
		return view('chat.index', ['messages' => $messages]);
    }
	
	 public function Chatone($id){
		$messages = Message::where('autor', '=', $id)->get();	
		return view('chat.index', ['messages' => $messages, 'id' => $id]);
    }
	
	public function Activechat(){
		$users = User::all();
		return view('chat.user', ['users' => $users]);
    }
	
	public function Posts(){
		$posts = Posts::all();
		return view('chat.posts', ['posts' => $posts]);
    }
	
	public function Addpost(Request $request){
		$post = Posts::create($request->all());
		return response()->json(array('msg'=> 'True'), 200);
    }
	
	public function Editpost(Request $request){	

		$post = Posts::find($request->id);
		$post->data = $request->data;
		$post->isComments = $request->isComments;	
		return response()->json(array('msg'=> $post->save()), 200);
    }
	
	public function Postupdate($id){
		$post = Posts::where('id', '=', $id)->get();	
		return view('chat.postupdate', ['post' => $post, 'id' => $id]);
	}
	
	public function Postchat($id){					
		$messages = Message::where('post_id', '=', $id)->get();	
		return view('chat.index', ['messages' => $messages, 'id' => $id]);	
	}
	
	public function Message(Request $request){
				
		$message = Message::create($request->all());
		event (
				new NewMessageAdded($message)
		);
    }
	
	public function Postdelete(Request $request){
		$posts = Posts::find($request->id)->delete();
		return response()->json(array('msg'=> $posts), 200);
    }
	
	public function Messagedelete(Request $request){
		$posts = Message::find($request->id)->delete();
		return response()->json(array('msg'=> $posts), 200);
    }
	

	public function Messageupdate(Request $request){
		$message = Message::find($request->id);	

		if($request->isMethod('post')){
			$message->content = $request->content;	
			$message->save();		
		}	
		return view('chat.messageupdate', ['message' => $message, 'id' => $request->id]);
    }
}
