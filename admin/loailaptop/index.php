<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2 class="text-center m-2">Loại laptop</h2>
    <?php
    echo "<button type='button' class='btn btn-success m-2'><a href='?ctrl=loailaptop&act=add' class='text-decoration-none text-white m-2'>Thêm loại</a></button>";
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
        echo "<table class='table table-bordered'>
                <tr>
                    <th>Mã loại</th>
                    <th>Tên loại</th>
                    <th></th>
                </tr>";
                foreach($r as $row){ ?>
                    <tr>
                        <td><?= $row[0]; ?></td>
                        <td><?= $row[1]; ?></td>
                        <td class="text-center">
                            <button type="button" class="btn btn-success"><a href="?ctrl=loailaptop&act=edit&id=<?= $row[0]; ?>" class="text-decoration-none text-white p-2">Sửa</a></button>
                            <button type="button" class="btn btn-success"><a href="?ctrl=loailaptop&act=delete&id=<?= $row[0]; ?>" onclick="return confirm('có muốn xóa không?')" class="text-decoration-none text-white p-2">Xóa</a></button>
                        </td>
                    </tr>
                <?php } ?>
            </table>
</body>
</html>