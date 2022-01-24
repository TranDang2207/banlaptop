<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <button type='button' class='btn btn-success m-2'><a href='?ctrl=donhang' class='text-decoration-none text-white m-2'>Trở lại</a></button>
    <form action="?ctrl=khachhang&act=update" method="post" class="col-6 m-auto my-4">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Mã khách hàng</label>
            <input type="text" class="form-control" name="txtMa" id="exampleInputEmail1" value="<?= $getKH['id_kh'] ?>" aria-describedby="emailHelp" readonly>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword2" class="form-label">Họ và tên</label>
            <input type="text" class="form-control" name="hoten" id="exampleInputPassword2" value="<?= $getKH['ten_kh'] ?>" readonly>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword2" class="form-label">Username</label>
            <input type="text" class="form-control" name="txtTen" id="exampleInputPassword2" value="<?= $getKH['username'] ?>" readonly>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword2" class="form-label">Email</label>
            <input type="text" class="form-control" name="txtTen" id="exampleInputPassword2" value="<?= $getKH['email'] ?>" readonly>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword2" class="form-label">Số điện thoại</label>
            <input type="text" class="form-control" name="txtTen" id="exampleInputPassword2" value="<?= $getKH['phone'] ?>" readonly>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Địa chỉ</label>
            <textarea class="form-control" name="" id="" rows="3" readonly>
                <?= $getKH['dia_chi'] ?>
            </textarea>
        </div>
    </form>
</body>
</html>