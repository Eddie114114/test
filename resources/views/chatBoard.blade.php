<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat Board</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .breakWord {
            word-wrap: break-word;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Chat Board</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item mr-3">
                    <!-- 新增留言表單 -->
                    <form action="{{ route('chatBoard.store') }}" method="post">
                        @csrf
                        <input type="text" name="title" placeholder="標題">
                        <input type="text" name="content" placeholder="內容"></textarea>
                        <button type="submit">新增/修改</button>
                    </form>
                </li>

                <li class="nav-item">
                    <!-- 刪除留言表單 -->
                    <form action="{{ route('chatBoard.destroy') }}" method="post">
                        @csrf
                        @method('DELETE')
                        <input type="text" name="title" placeholder="要刪除的標題">
                        <button type="submit">刪除留言</button>
                    </form>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-4">
        <!-- 留言列表 -->
        <ul>
            @foreach ($chats as $chat)
                <li>{{ $chat->title }}: <span class="breakWord">{{ $chat->content }}</li>
                <hr>
            @endforeach
        </ul>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>