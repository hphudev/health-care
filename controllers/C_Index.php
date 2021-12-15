<script>
    if (sessionStorage.getItem("IDUser") != null)
    {
        $("#btnMenuSignIn").addClass("d-none");
        $("#btnMenuSignUp").addClass("d-none");
        $("#btnMenuManageStaff").removeClass("d-none");
        $("#btnMenuManageArticle").removeClass("d-none");
        $("#btnMenuMyArticle").removeClass("d-none");
        $("#btnMenuMyAccount").removeClass("d-none");

    }
    else
    {
        
        // if (location.href != "./index.php?page=home")
            // location.href = "./index.php?page=home";
    }

    function closeForm(idElement) {
        // $('#' + idElement).hide();
        $('#' + idElement).removeClass('show');
        $('body').removeClass('modal-open');
        $('.modal-backdrop').remove();
        location.reload();
        // showForm("exampleModalToggle2");
        // $('#' + idElement).show();
        // $('body').addClass('modal-open');
        // $('#' + idElement).modal('show');
    }

    function sleep(ms) {
        return new Promise(resolve => setTimeout(resolve, ms));
    }

    // Hàm gửi mail
    function sendEmail(emailStaff, subject, body) {
			Email.send({
				Host: "smtp.gmail.com",
				Username : "<sender’s email address>",
				Password : "<email password>",
				To : emailStaff,
				From : "<sender’s email address>",
				Subject : subject,
				Body : body,
			})
			.then(function(message){
				Swal.fire({
                    icon: "success",
                    title: "Mã OTP đã gửi đến email của bạn",
                    timer: 500,
                    showConfirmButton: false
                });
			});
		}
</script>

<!-- Đăng ký hoặc chỉnh sửa thông tin nhân viên -->
<script type="text/javascript">
    var elementBtnSignIn = document.getElementById("btnSignUpOrEdit");
    elementBtnSignIn.addEventListener('click', function (param) {
        console.log("Đã hoàn thành form Sign Up/Edit " + elementBtnSignIn.textContent);
        let data = {};
        if (elementBtnSignIn.textContent == "ĐĂNG KÝ")
            data.name = "addStaff";
        else
            data.name = "editStaff";
        data.nameStaff = document.getElementById("nameStaff").value;
        data.sexStaff = document.getElementById("sexStaff").value;
        data.birthStaff = document.getElementById("birthStaff").value;
        // data.phoneStaff = document.getElementById("phoneStaff").value;
        data.emailStaff = document.getElementById("emailStaff").value;
        data.usernameStaff = document.getElementById("usernameStaff").value;
        data.passwordStaff = document.getElementById("passwordStaff").value;
        if (data.nameStaff == "" || data.sexStaff == "" || data.birthStaff == ""
            || data.emailStaff == "" || data.usernameStaff == "" || data.passwordStaff == "")
        {
            Swal.fire({
                title: "Cảnh báo",
                icon: "warning",
                text: "Bạn vui lòng nhập đầy đủ thông tin để đăng ký mới!"
            });
            return;
        }
        if (data.passwordStaff != document.getElementById("confirmPasswordStaff").value)
        {
            Swal.fire({
                title: "Cảnh báo",
                icon: "warning",
                text: "Mật khẩu xác nhận chưa đúng"
            });
            return;
        }
        console.log("Đã thiết lập data: " + JSON.stringify(data));
        Swal.fire({
                title: "Thông báo",
                icon: "info",
                text: "Hệ thống đang đăng ký cho bạn!",
                showConfirmButton: false,
                allowOutsideClick: false
            });
        Swal.showLoading();
        $.ajax({
            type: "POST",
            url: "./models/M_Index_Port.php",
            data: {
                data: JSON.stringify(data)
            },
            success: async function (response) {
                console.log("Dữ liệu trả về: " + response);
                await sleep(1000);
                Swal.close();
                if (response == 1)
                {
                    document.getElementById("nameStaff").value = "";
                    document.getElementById("sexStaff").value = "Nam";
                    document.getElementById("birthStaff").value = "";
                    // document.getElementById("phoneStaff").value = "";
                    document.getElementById("emailStaff").value = "";
                    document.getElementById("usernameStaff").value = "";
                    document.getElementById("passwordStaff").value = "";
                    document.getElementById("confirmPasswordStaff").value = "";
                    Swal.fire({
                        title: "Đăng ký thành công",
                        icon: "info",
                        timer: 1000
                    })
                    .then(()=>{
                        // sessionStorage.setItem('IDUser', result['MaND']);
                        closeForm('exampleModalToggle2');
                        location.reload();
                    })
                }
                else
                {
                    if (response == "exist")
                    {
                        Swal.fire({
                            title: "Cảnh báo",
                            icon: "warning",
                            text: "Tên đăng nhập đã tồn tại!"
                        });
                    }
                    else
                    {
                        Swal.fire({
                            title: "Sự cố đăng ký",
                            icon: "error",
                            text: "Bạn vui lòng kiểm tra lại kết nối mạng?"
                        });
                    }
                   
                }
            }
        });
    });
</script>

<!-- Đăng nhập -->
<script type="text/javascript">

    var elementButtonSignIn = document.getElementById("btnSignIn");
    elementButtonSignIn.addEventListener("click", function (param) { 
        let data = {};
        data.name = "checkLogin";
        data.usernameStaff = document.getElementById("usernameSignIn").value;
        data.passwordStaff = document.getElementById("passwordSignIn").value;
        console.log("Dữ liệu được gửi đi: " + JSON.stringify(data));
        if (data.usernameStaff == "" || data.passwordStaff == "")
        {
            Swal.fire({
                icon: "warning",
                title: "Cảnh báo",
                text: "Bạn vui lòng nhập đầy đủ thông tin đăng nhập",
                timer: 1000
            });
            return;
        }
        Swal.fire({
            icon: "info",
            title: "Đang kiểm tra",
            text: "Quá trình đăng nhập đang diễn ra",
            showConfirmButton: false,
            timer: 700
        });
        Swal.showLoading();
        $.ajax({
            type: "POST",
            url: "./models/M_Index_Port.php",
            data: {
                data: JSON.stringify(data)
            },
            success: async function (response) {
                console.log("Kết quả trả về: " + response);
                await sleep(1000);
                Swal.close();
                let result = JSON.parse(response);
                if (result['state'] == true)
                {
                    console.log("Đã xét IDUser đăng nhập: " + result['MaND']);
                    sessionStorage.setItem('IDUser', result['MaND']);
                    Swal.fire({
                        icon: "success",
                        title: "Thông báo",
                        text: "Đăng nhập thành công",
                        showConfirmButton: false,
                        timer: 700
                    })
                    .then(()=>{
                        closeForm("exampleModalToggle");
                        location.reload();
                    });
                }
                else
                {
                    if (result['state'] == "not exist")
                    {
                        Swal.fire({
                            icon: "warning",
                            title: "Cảnh báo",
                            text: "Tài khoản của bạn chưa đăng ký!",
                        })
                    }
                    if (sessionStorage.getItem('MaND') != null)
                        sessionStorage.removeItem('MaND');
                }
                if (sessionStorage.getItem('IDUser') != null)
                {
                    let data = {};
                    data.name = "updateSessionIDUser";
                    data.IDUser = sessionStorage.getItem("IDUser");
                    $.ajax({
                        type: "POST",
                        url: "./models/M_Index_Port.php",
                        data: {
                            data: JSON.stringify(data)
                        },
                        success: function (response) {
                            console.log("Tình trạng cập nhật session server: " + response);
                        }
                    });
                }    
                else
                {
                    let data = {};
                    data.name = "unsetSessionIDUser";
                    data.IDUser = sessionStorage.getItem("IDUser");
                    $.ajax({
                        type: "POST",
                        url: "./models/M_Index_Port.php",
                        data: {
                            data: JSON.stringify(data)
                        },
                        success: function (response) {
                            console.log("Tình trạng cập nhật session server: " + response);
                        }
                    });
                }                
            }
        });
    });
</script>
<!-- Đăng xuất -->
<script type="text/javascript">
    var elementSignOut = document.getElementById("btnMenuSignOut");
    elementSignOut.addEventListener('click', function (param) {
        Swal.fire({
            icon: "info",
            title: "Hệ thống đang đăng xuất",
            timer: 1000
        })
        .then(()=>{
            Swal.fire({
                icon: "success",
                title: "Đăng xuất thành công",
                timer: 500,
                showConfirmButton: false
            })
            .then(()=>{
                sessionStorage.removeItem('IDUser');
                let data = {};
                data.name = "unsetSessionIDUser";
                // data.IDUser = sessionStorage.getItem("IDUser");
                $.ajax({
                    type: "POST",
                    url: "./models/M_Index_Port.php",
                    data: {
                        data: JSON.stringify(data)
                    },
                    success: function (response) {
                        console.log("Tình trạng cập nhật session server: " + response);
                        location.reload();
                    }
                });
            })
        });
        Swal.showLoading();
    });
</script>
<!-- Thanh Menu trên cùng -->
<script type="text/javascript">
    var elementMenuButtonManageStaff = document.getElementById("btnMenuManageStaff");
    elementMenuButtonManageStaff.addEventListener('click', function (param) {
        // Swal.fire({
        //     // icon: "info",
        //     title: "Đang nạp dữ liệu",
        //     timer: 1000
        // })
        // .then(()=>{
        //     location.href="./index.php?page=staff";
        // });
        // Swal.showLoading();
    });
</script>