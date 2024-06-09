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
        <h2>HIỂN THỊ CHI TIẾT DỮ LIỆU POST
            {{ $post['id'] }}
        </h2>
        <div style="display: flex;justify-content: center;" class="img">
            <img src="{{ $post['image'] }}" alt="" width="50%">
        </div>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Category ID</th>
                    <th>Title</th>
                    <th>Excerpt</th>
                    <th>Content</th>
                    <!-- <th>Image</th> -->
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $post['id'] }}</td>
                    <td>{{ $post['category_id'] }}</td>
                    <td>{{ $post['title'] }}</td>
                    <td>{{ $post['excerpt'] }}</td>
                    <td>{{ $post['content'] }}</td>
                    <!-- <td><img src="{{ $post['image'] }}" alt="" width="100px"></td> -->
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>