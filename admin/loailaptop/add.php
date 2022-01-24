<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <button type='button' class='btn btn-success m-2'><a href='?ctrl=loailaptop' class='text-decoration-none text-white m-2'>Trở lại</a></button>
    <form action="?ctrl=loailaptop&act=insert" method="post" class="col-6 m-auto">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Mã loại</label>
            <input type="text" class="form-control" name="txtMa" id="exampleInputEmail1" aria-describedby="emailHelp" disabled>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword2" class="form-label">Tên loại</label>
            <input type="text" class="form-control" name="txtTen" id="exampleInputPassword2" required>
        </div>
        <button type="submit" class="btn btn-primary">Thêm loại</button>
    </form>
</body>
</html>