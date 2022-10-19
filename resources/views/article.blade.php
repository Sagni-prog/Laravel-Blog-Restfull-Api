<h1>Article Here</h1>
@foreach($article as $article)
<h1>{{$article->article_title}}</h1>
<h3>{{$article->article_body}}</h3>
<p>Image: {{optional($article->image)->image_name}}</p>
@foreach ($article->comments as $comment)
<p>{{$comment->body}}</p>
@endforeach
@endforeach