<?php namespace App;
//Model for table posts 
use Illuminate\Database\Eloquent\Model;

class Posts extends Model {

	protected $table = 'posts';
	public $timestamps = false;

}
