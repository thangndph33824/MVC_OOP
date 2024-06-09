<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách người dùng</title>
    <link rel="stylesheet" href="../../../../assets/css/style_index.css">
</head>

<body>
    <div class=" container">
        <button><a href="/admin/users/create" class="btn btn-info">Thêm mới</a></button>
        <h2>Danh sách người dùng</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Nút Chức Năng</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($users as $user)
                <tr>
                    <td> {{ $user['id'] }} </td>
                    <td> {{ $user['name'] }} </td>
                    <td> {{ $user['email'] }} </td>
                    <td> {{ $user['password'] }} </td>
                    <td>
                        <a href="/admin/users/{{ $user['id'] }}/delete"><button>xóa</button></a>
                        <a href="/admin/users/{{ $user['id'] }}/update"><button>sửa</button></a>
                        <a href="/admin/users/{{ $user['id'] }}/show"><button>xem chi tiết</button></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>