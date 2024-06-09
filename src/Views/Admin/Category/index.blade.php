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
        <h2>Danh sách danh mục</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Nút Chức Năng</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                <tr>
                    <td>{{ $category['id'] }}</td>
                    <td>{{ $category['name'] }}</td>
                    <td>
                        <a href="/admin/category/{{ $category['id'] }}/delete"><button>xóa</button></a>
                        <a href="/admin/category/{{ $category['id'] }}/update"><button>sửa</button></a>
                        <a href="/admin/category/{{ $category['id'] }}/show"><button>xem chi tiết</button></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>