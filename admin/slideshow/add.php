<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    echo "<button type='button' class='btn btn-success m-2'><a href='?ctrl=slideshow' class='text-decoration-none text-white m-2'>Trở lại</a></button>";
    echo "
    <table class='table table-bordered'>
                <tr>
                    <th>Mã</th>
                    <th>Tên</th>
                    <th>Ngày nhập</th>
                    <th>Hình ảnh</th>
                    <th>Giá</th>
                    <th>Giảm giá</th>
                    <th>Loại</th>
                    <th>Ẩn hiện</th>
                    <th>Checkbox</th>
                </tr>";
                foreach($r as $row){?>
                    <tr>
                        <td><?= $row[0]; ?></td>
                        <td><?= $row[1]; ?></td>
                        <td><?= date('d/m/Y', strtotime($row['ngayNhap'])) ?></td>
                        <td><img src="../views/images/<?= $row["2"] ?>" alt="" width="150px"></td>
                        <td><?= $row[3]; ?></td>
                        <td><?= $row[4]; ?></td>
                        <td><?= $row["ten_loai"]; ?></td>
                        <td><?php if($row['AnHien'] == 1){
                            echo 'Hiện';
                        }else{
                            echo 'Ẩn';
                        }?></td>
                        <td>
                            <a class="btn btn-primary" href="?ctrl=slideshow&act=update&id=<?= $row[0] ?>" role="button">Thêm</a>
                        </td>
                    </tr>
                <?php } ?>
            </table>
</body>
</html>