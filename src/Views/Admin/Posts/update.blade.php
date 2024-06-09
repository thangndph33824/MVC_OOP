<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UPDATE USER</title>
    <link rel="stylesheet" href="../../../../assets/css/style_creater.css">
</head>

<body>
    <div class="container">
        <h2>CẬP NHẬT LẠI DỮ LIỆU NGƯỜI DÙNG <br> {{ $post['id'] }}</h2>
        <form method="POST" action="" enctype="multipart/form-data">
            <label for="category_id" class="form-label">Category:</label>
            <select class="form-control" id="category_id" required name="category_id">
                @foreach ($categories as $category)
                <option @if ($category['id']==$post['category_id']) selected @endif value="{{ $category['id'] }}">
                    {{ $category['name'] }}</option>
                @endforeach
            </select>

            <label for="title">title:</label>
            <input type="text" id="title" value="{{ $post['title'] }}" name="title" required>

            <label for="excerpt">excerpt:</label>
            <input type="text" id="excerpt" value="{{ $post['excerpt'] }}" name="excerpt" required>

            <label for="content">content:</label>
            <input type="text" id="content" value="{{ $post['content'] }}" name="content" required>
            <h2>ẢNH CŨ :</h2><br>
            <div style="display: flex;justify-content: center;" class="img">
                <img src="{{ $post['image'] }}" alt="" width="50%">
            </div>
            <label for="image">image:</label>
            <input type="file" id="image" value="{{ $post['p_title'] }}" name="image">
            <br>
            <button type="submit">Thêm mới</button>
        </form>
    </div>
</body>

</html>