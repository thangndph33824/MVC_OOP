<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách danh mục</title>
    <link rel="stylesheet" href="../../../../assets/css/style_index.css">
</head>

<body>
    <div class="container">
        <button><a href="/admin/category/create" class="btn btn-info">Thêm mới</a></button>
        <h2>HIỂN THỊ CHI TIẾT DỮ LIỆU NGƯỜI DÙNG
            <? ?>
        </h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                </tr>
                <tr>
                    <th>{{ $category['id'] }}</th>
                    <th>{{ $category['name'] }}</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</body>

</html>