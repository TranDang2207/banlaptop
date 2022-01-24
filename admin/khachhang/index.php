<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2 class="text-center m-2">Khách hàng</h2>
    <button type='button' class='btn btn-success m-2'><a href='?ctrl=khachhang&act=add' class='text-decoration-none text-white m-2'>Thêm tài khoản</a></button>
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
                <th>Mã khách hàng</th>
                <th>Tên khách hàng</th>
                <th>Username</th>
                <th>Email</th>
                <th>Số điện thoại</th>  
                <th>Phân quyền</th>
                <th>Địa chỉ</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($r as $row) { 
                if($row['phanquyen'] == 1){
                    $quyen = 'Admin';
                }else{
                    $quyen = 'User';
                }
            ?>
            <tr>
                <td scope="row"><?= $row['id_kh'] ?></td>
                <td><?= $row['ten_kh'] ?></td>
                <td><?= $row['username'] ?></td>
                <td><?= $row['email'] ?></td>
                <td><?= $row['phone'] ?></td>
                <td><?= $quyen ?></td>
                <td><?= $row['dia_chi'] ?></td>
                <td class="text-center">
                    <button type="button" class="btn btn-success my-2"><a href="?ctrl=khachhang&act=edit&id=<?= $row[0]; ?>" class="text-decoration-none text-white p-2">Sửa</a></button>
                    <button type="button" class="btn btn-success"><a href="?ctrl=khachhang&act=delete&id=<?= $row[0]; ?>" onclick="return confirm('có muốn xóa không?')" class="text-decoration-none text-white p-2">Xóa</a></button>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    
</body>
</html>