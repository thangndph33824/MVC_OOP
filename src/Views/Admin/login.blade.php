<!DOCTYPE html>
<html lang="vi">
<? session_start();?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Danh Mục</title>
    <link rel="stylesheet" href="../../../assets/css/style_creater.css">
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container">
        <h2>ĐĂNG NHẬP</h2>
        <?php if (!empty($_SESSION['errors'])) : ?>
        <div class="alert alert-danger">
            <ul>
                <?php foreach ($_SESSION['error'] as $key => $error) : ?>
                <li>Key:
                    <?php echo $key; ?> - Error:
                    <?php echo $error; ?>
                </li>
                <?php endforeach; ?>
            </ul>
        </div>
        <?php endif; ?>
        <form method="POST" action="" enctype="multipart/form-data">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <button type="submit">ĐĂNG NHẬP</button>
        </form>
    </div>
</body>

</html>