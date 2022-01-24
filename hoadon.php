<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
</script>
<link href="../admin/donhang/style.css" rel="stylesheet" />

<div class="page-content container">
    <div class="page-header text-blue-d2">
        <h1 class="page-title text-secondary-d1">
            Hóa đơn
            <small class="page-info">
                <i class="fa fa-angle-double-right text-80"></i>
                ID: #<?= $idDH ?>
            </small>
        </h1>

        <div class="page-tools">
            <div class="action-buttons">
                <a class="btn bg-white btn-light mx-1px text-95" href="?ctrl=donhang&act=edit&id=<?= $getDH['id_hd'] ?>"
                    data-title="Print">
                    <i class="mr-1 fa fa-pencil-square-o text-primary-m1 text-120 w-2"></i>
                    Edit
                </a>
                <a class="btn bg-white btn-light mx-1px text-95 <?php if($getDH['trangthai'] != 3) echo 'disabled' ?>"
                    href="?ctrl=donhang&act=delete&id=<?= $getDH['id_hd'] ?>"
                    onclick="return confirm('Bạn có chắc muốn xóa đơn hàng này?')" data-title="PDF">
                    <i class="mr-1 fa fa-trash text-danger-m1 text-120 w-2"></i>
                    Delete
                </a>
            </div>
        </div>
    </div>

    <div class="container px-0">
        <div class="row mt-4">
            <div class="col-12 col-lg-10 offset-lg-1">
                <div class="row">
                    <div class="col-12">
                        <div class="text-center text-150">
                            <img src="../views/images/logo.svg" style="width: 20%" alt="">
                        </div>
                    </div>
                </div>
                <!-- .row -->

                <hr class="row brc-default-l1 mx-n1 mb-4" />

                <div class="row">
                    <div class="col-sm-6">
                        <div>
                            <span class="text-sm text-grey-m2 align-middle">Đến:</span>
                            <span class="text-600 text-110 text-blue align-middle"><?= $getDH['ten_kh'] ?></span>
                        </div>
                        <div class="text-grey-m2">
                            <div class="my-1">
                                Địa chỉ: <?= $getDH['dia_chi'] ?>
                            </div>
                            <div class="my-1"><i class="fa fa-phone fa-flip-horizontal text-secondary"></i> <b
                                    class="text-600">Điện thoại: <a
                                        href="tel:<?= $getDH['phone']?>"><?= $getDH['phone'] ?></a></b></div>
                            <div class="my-1"><i class="fa fa-envelope" aria-hidden="true"></i> <b
                                    class="text-600">Email: <a
                                        href="mailto:<?= $getDH['email'] ?>"><?= $getDH['email'] ?></a></b></div>
                        </div>
                    </div>
                    <!-- /.col -->

                    <div class="text-95 col-sm-6 align-self-start d-sm-flex justify-content-end">
                        <hr class="d-sm-none" />
                        <div class="text-grey-m2">
                            <div class="mt-1 mb-2 text-secondary-m1 text-600 text-125">
                                Hóa đơn
                            </div>

                            <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span
                                    class="text-600 text-90">ID:</span> #<?= $getDH['id_hd'] ?></div>

                            <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span
                                    class="text-600 text-90">Ngày mua:</span>
                                <?= date('d/m/Y', strtotime($getDH['ngay'])) ?></div>

                            <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span
                                    class="text-600 text-90">Trạng thái:</span>
                                <?php 
                                if($getDH['trangthai'] == 0){
                                    $quyen = 'Chờ xác nhận';
                                    echo '<span class="badge bg-secondary">'. $quyen .'</span></div>';
                                }else if ($getDH['trangthai'] == 1){
                                    $quyen = 'Đang giao hàng';
                                    echo '<span class="badge bg-warning text-dark">'. $quyen .'</span>';
                                }else if ($getDH['trangthai'] == 2){
                                    $quyen = 'Đã giao hàng';
                                    echo '<span class="badge bg-success">'. $quyen .'</span>';
                                }else{
                                    $quyen = 'Đã hủy';
                                    echo '<span class="badge bg-danger">'. $quyen .'</span>';
                                }
                            ?>
                            </div>
                        </div>
                        <!-- /.col -->
                    </div>
                    <div class="row">
                        <div class="table-responsive my-4">
                            <table class="table table-striped">
                                <thead class="bgc-default-tp1 text-white">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Tên sản phẩm</th>
                                        <th scope="col">Loại sản phẩm</th>
                                        <th scope="col">Đơn giá</th>
                                        <th scope="col">Số lượng</th>
                                        <th scope="col">Thành tiền</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $giatien = 0;
                                    foreach ($OrderDetail as $r) { 
                                    $giatien += $r['giatien'];    
                                ?>
                                    <tr>
                                        <th scope="row"><?= $r['id_hdct'] ?></th>
                                        <td><?= $r['ten_sp'] ?></td>
                                        <td><?= $r['ten_loai'] ?></td>
                                        <td class="text-center">
                                            <?php
                                                if($r['giam_gia'] == null || $r['giam_gia'] == 0){
                                                    echo $r['gia_goc'];
                                                }else{
                                                    echo $r['giam_gia'];
                                                }
                                            ?>
                                        </td>
                                        <td class="text-end"><?= $r['soluong'] ?></td>
                                        <td class="text-end"><?= $r['giatien'] ?></td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="row border-b-2 brc-default-l2"></div>

                    <!-- or use a table instead -->

                    <!-- <div class="table-responsive">
                <table class="table table-striped table-borderless border-0 border-b-2 brc-default-l1">
                    <thead class="bg-none bgc-default-tp1">
                        <tr class="text-white">
                            <th class="opacity-2">#</th>
                            <th>Description</th>
                            <th>Qty</th>
                            <th>Unit Price</th>
                            <th width="140">Amount</th>
                        </tr>
                    </thead>

                    <tbody class="text-95 text-secondary-d3">
                        <tr></tr>
                        <tr>
                            <td>1</td>
                            <td>Domain registration</td>
                            <td>2</td>
                            <td class="text-95">$10</td>
                            <td class="text-secondary-d2">$20</td>
                        </tr> 
                    </tbody>
                </table>
            </div> -->

                    <?php 
                        $giatien2 = $giatien * 0.1; 
                        $tongtien = ($giatien2 + $giatien);
                    ?>
                    <div class="row mt-3">
                        <div class="col-12 col-sm-7 text-grey-d2 text-95 mt-2 mt-lg-0">
                            Ghi chú (Ghi chú bổ sung như thông tin công ty hoặc thanh toán)
                            <hr>
                            <div>
                                <?= $getDH['ghichu'] ?>
                            </div>
                        </div>

                        <div class="col-12 col-sm-5 text-grey text-90 order-first order-sm-last">
                            <div class="row my-2">
                                <div class="col-7 text-right">
                                    Tổng phụ
                                </div>
                                <div class="col-5">
                                    <span class="text-120 text-secondary-d1"><?= $giatien ?></span>
                                </div>
                            </div>

                            <div class="row my-2">
                                <div class="col-7 text-right">
                                    Thuế (10%)
                                </div>
                                <div class="col-5">
                                    <span class="text-110 text-secondary-d1"><?= $giatien2  ?></span>
                                </div>
                            </div>

                            <div class="row my-2 align-items-center bgc-primary-l3 p-2">
                                <div class="col-7 text-right">
                                    Tổng tiền
                                </div>
                                <div class="col-5">
                                    <span class="text-150 text-success-d3 opacity-2"><?php echo $tongtien; ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>