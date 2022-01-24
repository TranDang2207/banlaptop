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
    <form action="?ctrl=donhang&act=update" method="post" class="col-6 m-auto">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Mã đơn hàng</label>
            <input type="text" class="form-control" name="txtMa" id="exampleInputEmail1" value="<?= $getDH['id_hd'] ?>" aria-describedby="emailHelp" readonly>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword2" class="form-label">Họ tên</label>
            <input type="text" class="form-control" name="txtTen" id="exampleInputPassword2" value="<?= $getDH['ten_kh'] ?>" readonly>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Ghi chú</label>
            <textarea class="form-control" name="" id="" rows="3" readonly>
                <?= $getDH['ghichu'] ?>
            </textarea>
        </div>
        <div class="mb-3">
            <label for="" class="form-label"> Trạng thái:</label>
            <select class="form-select" name="status" id="">
                <?php for($i = 0; $i < 4; $i++){
                        if($i == 0){
                            $quyen = 'Chờ xác nhận';
                        }else if ($i == 1){
                            $quyen = 'Đang giao hàng';
                        }else if ($i == 2){
                            $quyen = 'Đã giao hàng';
                        }else{
                            $quyen = 'Đã hủy';
                        }
                        if($i == $getDH['trangthai']){
                            echo "<option value='". $i ."' selected>". $quyen ."</option>";
                        }else{
                            echo "<option value='". $i ."'>". $quyen ."</option>";
                        }
                    }
                ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Cập nhật</button>
    </form>
</body>
</html>