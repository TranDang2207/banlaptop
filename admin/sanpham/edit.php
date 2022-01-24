<?php
session_start();
    $_SESSION['folder_root'] = '/PHP2/views/'; // DUONG DAN THU MUC
    // $_SESSION['folder_root'] = $_SERVER["REQUEST_URI"];  // ở đây tôi lấy luôn đường dẩn hiện tại
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="ckeditor/ckeditor.js"></script>
</head>
<body class="bg-light">
    <button type='button' class='btn btn-success m-2'><a href='?ctrl=sanpham'
            class='text-decoration-none text-white m-2'>Trở lại</a></button>
    <h2>Thêm mới sản phẩm</h2>
    <form action="?ctrl=sanpham&act=update&id=<?= $Pros[0] ?>" method="post" style="border: 1px solid grey"
        class="my-2 col-12 m-auto p-5 row bg-white">
        <div class="box-body col-12">
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label h6">Tên sản phẩm</label>
                <input type="text" required class="form-control" value="<?= $Pros['ten_sp'] ?>" name="txtTen" id="exampleInputPassword1">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword9" class="form-label h6">Đường dẫn SEO</label>
                <input type="text" class="form-control" name="txtTen" id="exampleInputPassword9" disabled
                    placeholder="Đang phát triển...">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword6" class="form-label h6">Danh mục sản phẩm</label>
                <select class="form-select" name="idcate" aria-label="Default select example">
                    <?php foreach ($listcate as $row) { 
                        if($Pros['id_loai'] == $row[0]){?>
                            <option value="<?= $row[0] ?>" selected><?= $row[1] ?></option>
                    <?php } else { ?>
                            <option value="<?= $row[0] ?>"><?= $row[1] ?></option>
                    <?php } }?>                    
                </select>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword3" class="form-label h6">Giá sản phẩm</label>
                <input type="number" required class="form-control" value="<?= $Pros['gia_goc'] ?>" name="price" id="exampleInputPassword3">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword4" class="form-label h6">Giá khuyến mãi</label>
                <input type="number" class="form-control" value="<?= $Pros['giam_gia'] ?>" name="price2" id="exampleInputPassword4">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword2" class="form-label h6">Hình ảnh</label>
                <div class="input-group mb-3">
                    <input type="text" id="exampleInputPassword2" value="http://localhost/php2/views/images/<?= $Pros['image'] ?>" name="img" class="form-control" aria-label="Recipient's username" aria-describedby="basic-addon2">
                    <button type="button" class="input-group-text" id="basic-addon2" data-bs-toggle="modal" data-bs-target="#exampleModal">Chọn ảnh</button>
                </div>
                <img src="http://localhost/php2/views/images/<?= $Pros['image'] ?>"" alt="" style="width: 200px" id="show_img">
            </div>
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Media file</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <iframe src="../admin/filemanager/file/dialog.php?field_id=exampleInputPassword2" 
                            style="width: 100%; height: 500px; border: 0; overflow-y: auto;" frameborder="0"></iframe>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label for="" class="form-label h6">Trạng thái</label>
                <div class="form-check">
                    <input class="form-check-input" value="1" type="radio" name="flexRadioDefault" id="flexRadioDefault1" <?php if($Pros['AnHien'] == 1){ echo 'checked';} ?>>
                    <label class="form-check-label" for="flexRadioDefault1">
                        Hiển thị
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" value="0" name="flexRadioDefault" id="flexRadioDefault2" <?php if($Pros['AnHien'] == 0){ echo 'checked';} ?>>
                    <label class="form-check-label" for="flexRadioDefault2">
                        Ẩn
                    </label>
                </div>
            </div>
            <label for="exampleInputPassword3" class="form-label h6">Nội dung</label>
            <div>
                <textarea class="ckeditor" id="content" name="content" cols="80" rows="10" style="height: 500px !important">
                    <?php if($Pros['mota'] != null){
                            echo $Pros['mota'];
                        } else { ?>
                            <table class="table" name="tablemota" border=1 style="width: 100%;">
                            <tr>
                                <th style="width: 20%">CPU</th>
                                <td value=""></td>
                            </tr>
                            <tr>
                                <th style="width: 20%">RAM</th>
                                <td></td>
                            </tr>
                            <tr>
                                <th style="width: 20%">Ổ lưu trữ:</th>
                                <td></td>
                            </tr>
                            <tr>
                                <th style="width: 20%">Card đồ họa</th>
                                <td></td>
                            </tr>
                            <tr>
                                <th style="width: 20%">Màn hình</th>
                                <td></td>
                            </tr>
                            <tr>
                                <th style="width: 20%">Bàn phím</th>
                                <td></td>
                            </tr>
                            <tr>
                                <th style="width: 20%">Audio</th>
                                <td></td>
                            </tr>
                            <tr>
                                <th style="width: 20%">Đọc thẻ nhớ</th>
                                <td></td>
                            </tr>
                            <tr>
                                <th style="width: 20%">Kết nối có dây (LAN)</th>
                                <td></td>
                            </tr>
                            <tr>
                                <th style="width: 20%">Kết nối không dây</th>
                                <td></td>
                            </tr>
                            <tr>
                                <th style="width: 20%">Webcam</th>
                                <td></td>
                            </tr>
                            <tr>
                                <th style="width: 20%">Cổng giao tiếp</th>
                                <td></td>
                            </tr>
                            <tr>
                                <th style="width: 20%">Hệ điều hành</th>
                                <td></td>
                            </tr>
                            <tr>
                                <th style="width: 20%">Pin</th>
                                <td></td>
                            </tr>
                            <tr>
                                <th style="width: 20%">Trọng lượng</th>
                                <td></td>
                            </tr>
                            <tr>
                                <th style="width: 20%">Kích thước</th>
                                <td></td>
                            </tr>
                            <tr>
                                <th style="width: 20%">Màu sắc</th>
                                <td></td>
                            </tr>
                            <tr>
                                <th style="width: 20%">Bảo mật</th>
                                <td></td>
                            </tr>
                        </table>  
                        <h2>Đánh giá chi tiết</h2>
                        <?php
                        }
                    ?>
                </textarea>
            </div>
        </div>
        <button type="submit" onclick="myFunction()" class="btn btn-primary m-2 col-2">Cập nhật sản phẩm</button>
        </div>
    </form>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript">
    $("#exampleModal").on('hide.bs.modal', function(){
        var _img = $('input#exampleInputPassword2').val();
        $('img#show_img').attr('src',_img);
    })
</script>
</html>