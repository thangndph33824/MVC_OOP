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
        <h2>CẬP NHẬT LẠI DỮ LIỆU NGƯỜI DÙNG <br> {{ $user['name'] }}</h2>
        <form method="POST" action="">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="{{ $user['name'] }}">

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="{{ $user['email'] }}">

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" value="{{ $user['password'] }}">

            <button type="submit">CẬP NHẬT</button>
        </form>
    </div>
</body>

</html>