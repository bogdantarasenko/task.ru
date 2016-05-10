
<ul class="media-list">
          <li class="media">
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
          </li>
</ul>
