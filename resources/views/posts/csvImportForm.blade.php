<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CSVインポート</title>
</head>
<body>
    <h1>CSVファイルをインポート</h1>

    @if (session('success'))
        <p style="color:green;">{{ session('success') }}</p>
    @endif
    @if (session('error'))
        <p style="color:red;">{{ session('error') }}</p>
    @endif

    <form action="{{ route('posts.csvImport') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="csv_file" required>
        <button type="submit">インポート</button>
    </form>

    <p><a href="{{ route('posts.index') }}">トップに戻る</a></p>

</body>
</html>