<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Posts;

class MainController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Welcome Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders the "marketing page" for the application and
	| is configured to only allow guests. Like most of the other sample
	| controllers, you are free to modify or remove it as you desire.
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		//$this->middleware('guest');
	}

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		$posts = Posts::all()->toArray();
		//$posts = Posts::all()->orderBy('id', 'desc');
		//$res = self::build_tree($posts);

		$new_arr = self::process_arr($posts);

		
		$tree_of_comments = self::build_tree($new_arr);


		return view('posts',['data'=>$tree_of_comments]);
	}

	public function render_auth(){
		return view('auth');
	}

	public function addpost(Request $request){
		$post_text = $request->post_text;

		//echo $post_data;
		
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

		//dd($comment_text);

		$post = new Posts;
		$post->parent_id = $parent_id;
		$post->post_text = $comment_text;
		$post->post_time = time();

		if($post->save()){
			return redirect('/');
		};
		
	}



	public static function process_arr($data){

		$_comments = [];
		//dd($data["id"]);
		for($i=0;$i<count($data);$i++){
			 $_comments[$data[$i]['id']] = $data[$i];
		}
		
		return $_comments;

	}

	public static function build_tree($data){

	    $tree = array();

	    foreach($data as $id => &$row){

	        if(empty($row['parent_id'])){

	            $tree[$id] = &$row;

	        }

	        else{

	            $data[$row['parent_id']]['childs'][$id] = &$row;

	        }
			
			//var_dump($row['parent_id']);
	    }

	    return $tree;

	}



}
//-----------------------
