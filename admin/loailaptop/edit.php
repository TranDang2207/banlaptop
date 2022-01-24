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
    <form action="?ctrl=loailaptop&act=update" method="post" class="col-6 m-auto">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Mã loại</label>
            <input type="text" class="form-control" name="txtMa" value="<?= $cata['id_loailaptop'] ?>" id="exampleInputEmail1" aria-describedby="emailHelp" readonly>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Tên loại</label>
            <input type="text" required class="form-control" name="txtTen" value="<?= $cata['ten_loailaptop'] ?>" id="exampleInputPassword1">
        </div>
        <button type="submit" class="btn btn-primary">Cập nhật</button>
    </form>
</body>
</html>