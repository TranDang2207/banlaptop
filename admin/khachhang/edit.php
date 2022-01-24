<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<button type='button' class='btn btn-success m-2'><a href='?ctrl=khachhang' class='text-decoration-none text-white m-2'>Trở lại</a></button>
<form action="?ctrl=khachhang&act=update" method="post" class="col-6 m-auto">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Mã khách hàng</label>
            <input type="text" class="form-control" name="txtMa" id="exampleInputEmail1" value="<?= $getKH['id_kh'] ?>" aria-describedby="emailHelp" readonly>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword2" class="form-label">Username</label>
            <input type="text" class="form-control" name="txtTen" id="exampleInputPassword2" value="<?= $getKH['username'] ?>" readonly>
        </div>
        <div class="mb-3">
                <label for="" class="form-label h6">Quyền hạn</label>
                <div class="form-check form-check-inline offset-1">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="1" <?php if($getKH['phanquyen'] == 1) echo 'checked' ?>>
                    <label class="form-check-label" for="inlineRadio1">Admin</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="0" <?php if($getKH['phanquyen'] == 0) echo 'checked' ?>>
                    <label class="form-check-label" for="inlineRadio2">User</label>
                </div>
            </div>
        <button type="submit" class="btn btn-primary">Cập nhật</button>
    </form>
</body>
</html>