<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ url('css/style.css') }}">
    <title>edit Comment</title>
</head>
<body>
    <h1>{{ $post->car_model }} | コメント編集</h1>
    <p><a href="/posts/edit">トップへ戻る</a></p>
        
        @forelse($post->comments as $key => $comment)
            <div class="comment">
                <div class="comment-name">
                    <span class="comment-author">{{ $key + 1 }} . {{ $comment->comment_name }}</span>
                    <span class="comment-date">|{{ $comment->created_at }}</span>
                </div>
                <div class="comment-body-edit">{{ $comment->comment_body }}</div>
                <form method="post" action="{{ route('comments.destroy', [$post, $comment]) }}">
                    @method('DELETE')
                    @csrf
                    <button class="comment-delete">削除</button>
                </form>
            </div>
        @empty
            <div class="comment-body">コメントはありません</div>
        @endforelse
        </div>
</body>
</html>