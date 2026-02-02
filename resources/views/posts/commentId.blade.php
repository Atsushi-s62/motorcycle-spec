<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ url('css/style.css') }}">
    <title>{{ $post->car_model }} | レビュー</title>
</head>
<body>
    <h1>{{ $post->car_model }} | コメント</h1>
    <p><a href="/posts">トップへ戻る</a></p>

    <form method="post" action="{{ route('comments.store', $post) }}">
        @csrf
        <fieldset class="comment-form">
            <legend>コメント投稿</legend>
        <div class="form-group">
            <label for="comment_name">ネーム</label>
                <input type="text" id="comment_name" name="comment_name" value="{{ old('comment_name', '匿名') }}">
                @error('comment_name')
                    <p>{{ $message }}</p>
                @enderror
        </div>
        <div class="form-group">
            <label for="comment_body">コメント</label>
                <textarea id="comment_body" name="comment_body" value="{{ old('comment_body') }}" ></textarea>   
                @error('comment_body')
                    <p>{{ $message }}</p>
                @enderror  
        </div>
            <button class="comment-form-btn">コメント</button>
        </fieldset>
    </form>
    
    @forelse($post->comments as $key => $comment)
        <div class="comment">
            <div class="comment-name">
                <span class="comment-author">{{ $key + 1 }} . {{ $comment->comment_name }}</span>
                <span class="comment-date">|{{ $comment->created_at }}</span>
            </div>
            <div class="comment-body">{{ $comment->comment_body }}</div>
        </div>
    @empty
            <div class="comment-body">コメントはありません</div>
    @endforelse   
</body>
</html>