<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <button type='button' class='btn btn-success m-2'><a href='?ctrl=khachhang'
                class='text-decoration-none text-white m-2'>Trở lại</a></button>
        <h2>Thêm tài khoản</h2>
        <form method="post" action="?ctrl=khachhang&act=insert" style="border: 1px solid grey" novalidate class="needs-validation my-2 col-12 m-auto p-5 row bg-white">
            <div class="mb-3">
                <label for="validationCustom01" class="form-label">Họ và tên</label>
                <input type="text" class="form-control" name="hoten" id="validationCustom01" value="" required>
                    <div class="invalid-feedback">
                        Vui lòng nhập họ tên
                    </div>
            </div>
            <div class="mb-3">
            <label for="validationCustomUsername" class="form-label">Username</label>
                <input type="text" class="form-control" minlength=6 maxlength=14 name="username" id="validationCustomUsername" aria-describedby="inputGroupPrepend" value="" required placeholder="Độ dài ký tự từ 6 đến 14">
                <div class="invalid-feedback">
                    Vui lòng nhập Username
                </div>
            </div>
            <div class="mb-3">
            <label for="validationCustom03" class="form-label">Mật khẩu</label>
                <input type="password" class="form-control" id="pass" name="pass" minlength=8 id="validationCustom03" value="" required placeholder="Mật khẩu chứa ít nhất 8 ký tự">
                <div class="invalid-feedback">
                    Vui lòng nhập mật khẩu lớn hơn 8 ký tự
                </div>
            </div>
            <div class="mb-3">
            <label for="validationCustom04" class="form-label">Nhập lại mật khẩu</label>
                <input type="password" onchange="checkpass()" id="repass" class="form-control" name="repass" id="validationCustom04" value="" required>
                <div class="invalid-feedback">
                    Vui lòng nhập lại mật khẩu
                </div>
            </div>
            <div class="mb-3">
            <label for="validationCustom05" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" id="validationCustom05" value="" required>
                <div class="invalid-feedback">
                    Vui lòng nhập email
                </div>
            </div>
            <div class="mb-3">
            <label for="validationCustom06" class="form-label">Số điện thoại</label>
                <input type="text" class="form-control" onchange="checkphone()" name="phone" id="validationCustom06" value="" required>
                <div class="invalid-feedback">
                    Vui lòng nhập số điện thoại
                </div>
            </div>
            <div class="mb-3">
                <label for="" class="form-label h6">Quyền hạn</label>
                <div class="form-check form-check-inline offset-1">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="1">
                    <label class="form-check-label" for="inlineRadio1">Admin</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="0" checked>
                    <label class="form-check-label" for="inlineRadio2">User</label>
                </div>
            </div>
            <div class="mb-3">
                <label for="validationCustom03" class="form-label">Địa chỉ</label>
                <input type="text" class="form-control" name="diachi" id="validationCustom03" required>
                <div class="invalid-feedback">
                    Vui lòng nhập địa chỉ
                </div>
            </div>
            <div class="col-12">
                <button class="btn btn-primary" onclick="checkAll()" type="submit">Thêm khách hàng</button>
            </div>
        </form>
    </div>
</body>
<script>
    function checkpass(){
        var repass = document.querySelector("#repass").value;
        var pass = document.querySelector("#pass").value;
        if(repass != pass){
            alert('Lỗi: mật khẩu không trùng khớp!!');
            return false;
        }
    }

    function checkphone(){
        var inputPhoneNum = document.querySelector("#validationCustom06");
        inputPhoneNum.onblur=function(){
        v = this.value;
        pattern = /(09|03|08)+([0-9]{8}\b)/g;
        if (pattern.test(v)==false){
            alert('Lỗi: vui lòng nhập đúng số điện thoại');
            return false;
        }
    }
    }
</script>
<script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function () {
    'use strict'

    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.querySelectorAll('.needs-validation')

    // Loop over them and prevent submission
    Array.prototype.slice.call(forms)
        .forEach(function (form) {
        form.addEventListener('submit', function (event) {
            if (!form.checkValidity()) {
            event.preventDefault()
            event.stopPropagation()
            }

            form.classList.add('was-validated')
        }, false)
        })
    })()
</script>
<script>
    function checkAll(){
        var repass = document.querySelector("#repass").value;
        var pass = document.querySelector("#pass").value;
        if(repass != pass){
            alert('Lỗi: mật khẩu không trùng khớp!!');
            return false;
        }
        var inputPhoneNum = document.querySelector("#validationCustom06");
        inputPhoneNum.onblur=function(){
        v = this.value;
        pattern = /(09|03|08)+([0-9]{8}\b)/g;
        if (pattern.test(v)==false){
            alert('Lỗi: vui lòng nhập đúng số điện thoại');
            return false;
        }
    }
</script>
</html>