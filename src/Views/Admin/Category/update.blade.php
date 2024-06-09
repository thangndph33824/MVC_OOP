<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UPDATE CATEGORY</title>
    <link rel="stylesheet" href="../../../../assets/css/style_creater.css">
</head>

<body>
    <div class="container">
        <h2>CẬP NHẬT LẠI DỮ LIỆU CATEGORY <br> {{ $categories['name'] }}</h2>
        <form method="POST" action="">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="{{ $categories['name'] }}">
            <button type="submit">CẬP NHẬT</button>
        </form>
    </div>
</body>

</html>