<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <title>post</title>
    </head>
    <body>
        <nav>
            <ul class="gnav-navi-1">
                <li><a href="/calender">記録</a></li>
                <li><a href="/timer">タイマー</a></li>
                <li><a href="/calories">体重記録</a></li>
                <li><a href="/post">チャット</a></li>
            </ul>
        </nav>
        <div>
            <form action="/post/posts/search" method="GET">

             @csrf
            
                <input type="text" name="keyword">
                <input type="submit" value="検索">
            </form>
        </div>
    <h1>こんにちわ</h1>
        
        
        <a href='/post/posts/create'>create</a>
        <div class="posts">
            @foreach ($posts as $post) 
            <div class="post">
                <img src="{{ Storage::url($post->image)}}" width="100px">
                <h2 class="title">{{$post->title}}</h2>
                <p class="body">
                    <a href="/post/posts/{{$post->id}}">{{$post->cotent}}</a>
                </p>
                <form action="/post/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post">
                @csrf
                @method('DELETE')
                    <button type="button" onclick="deletePost({{ $post->id }})">delete</button>
                </form
            </div>
            @endforeach
        </div>
            
        </ul>
        <script>
            function deletePost(id) {
            'use strict'
            if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
            document.getElementById(`form_${id}`).submit();
            }
            }
        </script>
    </body>
</html>