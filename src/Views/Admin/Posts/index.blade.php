<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách Bài viết</title>
    <link rel="stylesheet" href="../../../../assets/css/style_index.css">
</head>

<body>
    <div class="container">
        <button><a href="/admin/posts/create" class="btn btn-info">Thêm mới</a></button>
        <h2>Danh sách Bài viết</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Excerpt</th>
                    <th>Image</th>
                    <th>Nút Chức Năng</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                <tr>
                    <td>{{ $post['id'] }}</td>
                    <td>{{ $post['title'] }}</td>
                    <td>{{ $post['excerpt'] }}</td>
                    <td> <img src="{{ $post['image'] }}" alt="" width="100px">
                    </td>
                    <td>
                        <a href="/admin/posts/{{ $post['id'] }}/delete"><button>xóa</button></a>
                        <a href="/admin/posts/{{ $post['id'] }}/update"><button>sửa</button></a>
                        <a href="/admin/posts/{{ $post['id'] }}/show"><button>xem chi tiết</button></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>