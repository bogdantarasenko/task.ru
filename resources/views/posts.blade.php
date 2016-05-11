
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Light IT</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/main.css')}}" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
    body {
        padding-top: 70px;
        /* Required padding for .navbar-fixed-top. Remove if using .navbar-static-top. Change if height of navigation changes. */
    }
    </style>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
       
    </nav>

    <!-- Page Content -->
    <div class="container">

        <div class="row">
            <div class="col-lg-12 text-center">
                <h1>test task for light it</h1><br>
               <? if (Auth::check())
				{
				  echo "authenticated";
				  echo "<br><a href='/auth/logout'>logout</a>";
				}else{
					echo "not authenticated";
					echo "<br><a href='/auth'>login</a>";
				}?>
        </div>
        <!-- /.row -->

    </div>

    <div class="container">
	  <div class="row">
	    <div class="col-md-12">
	      <div class="panel panel-info">
	        <div class="panel-heading">
	          Comments
	        </div>
	        <div class="panel-body comments">
	          <form action="/add" method="post">
				    <input type="hidden" name="_token" id="csrf-token" value="{{ csrf_token() }}" />
				    <textarea class="form-control" placeholder="Write your comment" name="post_text" rows="5"></textarea>
					<br>
					<input type="submit" class="btn btn-info pull-right">
			   </form>
	          <div class="clearfix"></div>
	          <hr>
	          <ul class="media-list">
	            
	            <!--here-->

	            <?//dd($data);?>



				@foreach ($data as $post)
					<div class="comment">
	               
		                <div class="media-body">
		                  <strong class="text-success">{{$post['id']}}</strong>
		                  <span class="text-muted">
		                  <small class="text-muted">{{date('d.m.Y H:i',$post['post_time'])}}</small>
		                  </span>
		                  
		                  <p>
		                    {{$post['post_text']}}
		                  </p>
		                  
		                  <div class="reply">
		                  	<div class="reply_btn">
		                  		<span class="text-muted pull-right">
				                	<small class="btn btn-danger btn-xs" id="reply"><i class="fa fa-times"></i> ответить</small>
			              		</span>
		                  	</div>
		                  	
		                  	<div class="reply_form">
			                  	<hr>
			                  	<form action="/addcomment" method="post">
				                  	<input type="hidden" name="_token" id="csrf-token" value="{{ csrf_token() }}" />
				                  	<input type="hidden" name="parent_id" value="{{$post['id']}}">
				                  	<textarea class="form-control" placeholder="Write your comment" name="comment_text" rows="3"></textarea>
							        <br>
							        <input type="submit" class="btn btn-info pull-right">
						        </form>
					        </div>
		                  </div>
		                <div class="clearfix"></div>
		              </div>
	              </div>
	              @if (!empty($post['childs']))
				  	  @include('comments', ['data'=>$post['childs']])
				  @endif
	                
				@endforeach


	          </ul>
	          
	        </div>
	      </div>
	    </div>
	  </div>
	</div>
	<form  action="/add" method="POST">
	  <input type="hidden" value="{{ csrf_token() }}" name="_token">
		<input type="text" name="data">
		<input type="submit">
	</form>
    <!-- /.container -->

    <!-- jQuery Version 1.11.1 -->
     <script src="{{asset('js/jquery.js')}}"></script>
    <!-- Bootstrap Core JavaScript -->
     <script src="{{asset('js/bootstrap.min.js')}}"></script>
     <!-- -->
     <script src="{{asset('js/main.js')}}"></script>
    

</body>

</html>
