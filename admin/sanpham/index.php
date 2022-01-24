<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    #aa{
        width: 80px;
        overflow: hidden;
        text-overflow: ellipsis;
        line-height: 25px;
        -webkit-line-clamp: 4;
        height: 80px;
        display: -webkit-box;
        -webkit-box-orient: vertical;
    }
</style>
<body>
    <h2 class="text-center m-2">Sản phẩm</h2>
    <?php
    echo "<button type='button' class='btn btn-success m-2'><a href='?ctrl=sanpham&act=add' class='text-decoration-none text-white m-2'>Thêm sản phẩm</a></button>";
    if(isset($_SESSION['messge'])) { ?>
        <div class="alert alert-success" role="alert">
            <?= $_SESSION['messge'] ?>
        </div>
    <?php } unset($_SESSION['messge']);
    if(isset($_SESSION['messge_error'])) {?>
        <div class="alert alert-warning" role="alert">
            <?= 'Lỗi: '. $_SESSION['messge_error'] ?>
        </div>
    <?php } unset($_SESSION['messge_error']);
        echo "<table class='table table-bordered'>
                <tr>
                    <th>Mã</th>
                    <th>Tên</th>
                    <th>Hình ảnh</th>
                    <th>Giá</th>
                    <th>Giảm giá</th>
                    <th>Loại</th>
                    <th>Ẩn hiện</th>
                    <th></th>
                </tr>";
                foreach($r as $row){?>
                    <tr>
                        <td><?= $row[0]; ?></td>
                        <td><?= $row[1]; ?></td>
                        <td><img src="../views/images/<?= $row["2"] ?>" alt="" width="150px"></td>
                        <td><?= $row[3]; ?></td>
                        <td><?= $row[4]; ?></td>
                        <td><?= $row["ten_loai"]; ?></td>
                        <td id='aa'><?php if($row['AnHien'] == 1){
                            echo 'Hiện';
                        }else{
                            echo 'Ẩn';
                        }?></td>
                        <td>
                            <button type="button" class="btn btn-success offset-2"><a href="?ctrl=sanpham&act=edit&id=<?= $row[0]; ?>" class="text-decoration-none text-white p-2">Sửa</a></button>
                            <button type="button" class="btn btn-success m-2"><a href="?ctrl=sanpham&act=delete&id=<?= $row[0]; ?>" onclick="return confirm('có muốn xóa không?')" class="text-decoration-none text-white p-2">Xóa</a></button>
                            <button type="button" class="btn btn-success offset-3"><a href="/PHP2/?action=chitietsp&id=<?= $row[0]; ?>" class="text-decoration-none text-white p-2">Xem chi tiết</a></button>
                        </td>
                    </tr>
                <?php } ?>
            </table>
            <?php if($messge != "") {?>
                <div class="alert alert-success" role="alert">
                    a <?= $messge ?>;
                </div>
            <?php } ?>
</body>
</html>