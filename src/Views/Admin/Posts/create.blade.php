<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm BÀI VIẾT</title>
    <link rel="stylesheet" href="../../../../assets/css/style_creater.css">
</head>

<body>
    <div class="container">
        <h2>Thêm Mới Post</h2>
        <form method="POST" action="" enctype="multipart/form-data">
            <label for="category_id">Category:</label><br>
            <select id="category_id" required name="category_id">
                @foreach ($categories as $category)
                <option style="height: 40px;" value="{{ $category['id'] }}">{{ $category['name'] }}</option>
                @endforeach
            </select><br>

            <label for="title">title:</label>
            <input type="text" id="title" name="title" required>
            <br>
            <label for="excerpt">excerpt:</label>
            <input type="text" id="excerpt" name="excerpt" required>
            <br>
            <label for="content">content:</label>
            <textarea id="content" name="content" required rows="20" cols="50"></textarea>

            <br>
            <label for="image">image:</label>
            <br>
            <input type="file" id="image" name="image"> <br> <br>
            <button type="submit">Thêm mới</button>
        </form>
    </div>
</body>

</html>