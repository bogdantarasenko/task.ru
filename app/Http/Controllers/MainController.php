<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Posts;
use DB;

class MainController extends Controller {

	public function __construct()
	{
		//$this->middleware('guest');
	}

	//render main page ,get and process data form db
	public function index()
	{
		$posts = Posts::all()->toArray();

		$new_arr = self::process_arr($posts);

		
		$tree_of_comments = array_reverse(self::build_tree($new_arr));

		return view('posts',['data'=>$tree_of_comments]);
	}

	public function render_auth(){

		return view('auth');
	}

	public function addpost(Request $request){

		$post_text = $request->post_text;
		
		$post = new Posts;
		$post->post_text = $post_text;
		$post->post_time = time();

		if($post->save()){
			return redirect('/');
		};
		
	}

	public function addcomment(Request $request){

		$parent_id = $request->parent_id;
		$comment_text  = $request->comment_text;

		$post = new Posts;
		$post->parent_id = $parent_id;
		$post->post_text = $comment_text;
		$post->post_time = time();

		if($post->save()){
			return redirect('/');
		};
		
	}

	//making an array from which than we build a tree arr
	public static function process_arr($data){

		$_comments = [];
		//dd($data["id"]);
		for($i=0;$i<count($data);$i++){
			 $_comments[$data[$i]['id']] = $data[$i];
		}
		
		return $_comments;

	}

	//building a tree from array
	public static function build_tree($data){

	    $tree = array();

	    foreach($data as $id => &$row){

	        if(empty($row['parent_id'])){

	            $tree[$id] = &$row;

	        }else{

	            $data[$row['parent_id']]['childs'][$id] = &$row;

	        }
			
	    }

	    return $tree;

	}



}
