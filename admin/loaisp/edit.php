<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <button type='button' class='btn btn-success m-2'><a href='?ctrl=loaisp' class='text-decoration-none text-white m-2'>Trở lại</a></button>
    <form action="?ctrl=loaisp&act=update" method="post" class="col-6 m-auto">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Mã loại</label>
            <input type="text" class="form-control" name="txtMa" value="<?= $cata['id_loai'] ?>" id="exampleInputEmail1" aria-describedby="emailHelp" readonly>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Tên loại</label>
            <input type="text" required class="form-control" name="txtTen" value="<?= $cata['ten_loai'] ?>" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword6" class="form-label h6">Thể loại laptop</label>
            <select class="form-select" name="idcate" aria-label="Default select example">
                    <?php foreach ($listcate as $row) { 
                        if($cata['id_loailaptop'] == $row[0]){?>
                            <option value="<?= $row[0] ?>" selected><?= $row[1] ?></option>
                    <?php } else { ?>
                            <option value="<?= $row[0] ?>"><?= $row[1] ?></option>
                    <?php } }?>                    
                </select>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Ẩn hiện</label>
            <div class="form-check">
                <input class="form-check-input" value="1" type="radio" name="flexRadioDefault" id="flexRadioDefault1" <?php if($cata['AnHien'] == 1) echo "checked" ?>>
                <label class="form-check-label"  for="flexRadioDefault1">
                    Hiện
                </label>
                </div>
                <div class="form-check">
                <input class="form-check-input" value="0"  type="radio" name="flexRadioDefault" id="flexRadioDefault2" <?php if($cata['AnHien'] == 0) echo "checked" ?>>
                <label class="form-check-label" for="flexRadioDefault2">
                    Ẩn
                </label>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Cập nhật</button>
    </form>
</body>
</html>