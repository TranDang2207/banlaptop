<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2 class="text-center m-2">Đơn hàng</h2>
    <form action="?ctrl=donhang&act=filter" class="form col-3 row m-3" method="post">
        <div class="col-9">
            <label for="" class="form-label fw-bolder"> Trạng thái:</label>
            <select class="form-select" name="filter" id="">
                <option value='' selected> Tất cả </option>
                <option value='0'> Chờ xác nhận </option>
                <option value='1'> Đang giao hàng </option>
                <option value='2'> Đã giao hàng </option>
                <option value='3'> Đã hủy </option>
            </select>
        </div>
        <div class="col-4 align-items-end row">
            <button class="btn btn-secondary" type="submit" id="button-addon2">Lọc</button>
        </div>
    </form>
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
                <th>Mã đơn hàng</th>
                <th>Tên khách hàng</th>
                <th>Ngày đặt</th>
                <th>Số lượng</th>
                <th>Tổng tiền</th>
                <th>Trạng thái</th>
                <th>Ghi chú</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($r as $row) { ?>
            <tr>
                <td scope="row">#<?= $row['id_hd'] ?></td>
                <td><?= $row['ten_kh'] ?></td>
                <td><?= date('d/m/Y', strtotime($row['ngay'])); ?></td>
                <td><?= $row['num_oder'] ?></td>
                <td><?= $row['tongtien'] ?></td>
                <td><?php if($row['trangthai'] == 0){
                                    $quyen = 'Chờ xác nhận';
                                    echo '<span class="badge bg-secondary">'. $quyen .'</span></div>';
                                }else if ($row['trangthai'] == 1){
                                    $quyen = 'Đang giao hàng';
                                    echo '<span class="badge bg-warning text-dark">'. $quyen .'</span>';
                                }else if ($row['trangthai'] == 2){
                                    $quyen = 'Đã giao hàng';
                                    echo '<span class="badge bg-success">'. $quyen .'</span>';
                                }else{
                                    $quyen = 'Đã hủy';
                                    echo '<span class="badge bg-danger">'. $quyen .'</span>';
                                } ?></td>
                <td><?= $row['ghichu'] ?></td>
                <td>
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?=$row['id_hd']?>" aria-expanded="true" aria-controls="collapseOne">
                                Chọn chức năng
                            </button>
                            </h2>
                            <div id="collapse<?=$row['id_hd']?>" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <div class="list-group">
                                    <a href="?ctrl=donhang&act=khachhangdetail&id=<?= $row['id_kh']; ?>" class="list-group-item list-group-item-action">Thông tin khách hàng</a>
                                    <a href="?ctrl=donhang&act=edit&id=<?= $row[0]; ?>" class="list-group-item list-group-item-action">Cập nhật trạng thái</a>
                                    <a href="?ctrl=donhang&act=orderdetail&id=<?= $row[0]; ?>" class="list-group-item list-group-item-action">Chi tiết đơn Hàng</a>
                                    <a href="?ctrl=donhang&act=delete&id=<?= $row[0]; ?>" onclick="return confirm('có muốn xóa không?')" class="list-group-item list-group-item-action <?php if($row['trangthai'] != 3) echo 'disabled' ?>">Xóa (Chỉ có thể xóa khi đã hủy đơn)</a>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    
</body>
</html>