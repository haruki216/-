<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <title>post</title>
    </head>
    <body>
        <h1>こんにちわ</h1>
        <a href='/post/posts/create'>create</a>
        <div class="posts">
            @foreach ($posts as $post) 
            <div class="post">
                <h2 class="title">{{$post->title}}</h2>
                <p class="body">
                    <a href="/post/posts/{{$post->id}}">{{$post->cotent}}</a>
                </p>
                
            </div>
            @endforeach
        </div>
            
        </ul>
    </body>
</html>