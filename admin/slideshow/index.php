<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2 class="text-center m-2">Quản lý SlideShow</h2>
    <button type='button' class='btn btn-success m-2'><a href='?ctrl=slideshow&act=add' class='text-decoration-none text-white m-2'>Thêm Slideshow</a></button>
    <?php
        if(isset($_SESSION['messge'])) { ?>
            <div class="alert alert-success" role="alert">
                <?= $_SESSION['messge'] ?>
            </div>
        <?php } unset($_SESSION['messge']);
        if(isset($_SESSION['messge_error'])) {?>
            <div class="alert alert-danger" role="alert">
                <?= 'Lỗi: '. $_SESSION['messge_error'] ?>
            </div>
        <?php } unset($_SESSION['messge_error']);
    ?>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên sản phẩm</th>
                <th>Ngày nhập</th>
                <th>Hình ảnh</th>
                <th>Loại sản phẩm</th>
                <th>Loại laptop</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($slide as $row) { 
                if($row['phanquyen'] == 1){
                    $quyen = 'Admin';
                }else{
                    $quyen = 'User';
                }
            ?>
            <tr>
                <td scope="row"><?= $row['id_sp'] ?></td>
                <td><?= $row['ten_sp'] ?></td>
                <td><?= date('d/m/Y', strtotime($row['ngayNhap'])) ?></td>
                <td><img src="../views/images/<?= $row["2"] ?>" alt="" width="150px"></td>
                <td><?= $row['ten_loai'] ?></td>
                <td><?= $row['ten_loailaptop'] ?></td>
                <td class="text-center">
                    <button type="button" class="btn btn-success"><a href="?ctrl=slideshow&act=delete&id=<?= $row[0]; ?>" onclick="return confirm('có muốn xóa sản phẩm này khỏi slideshow không?')" class="text-decoration-none text-white p-2">Xóa</a></button>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    
</body>
</html>