<h1>Post Here</h1>
@foreach($post as $post)
<h1>{{$post->post_title}}</h1>
<h3>{{$post->body}}</h3>
<p>Image: {{optional($post->image)->image_name}}</p>
@foreach ($post->comments as $comment)
<p>{{$comment->body}}</p>
@endforeach
@endforeach

