<?php 
    include_once "models/M_Staff_Action.php";
    if (isset($_SESSION['IDUser']))
    {
        $staffs = Staff::getAllStaff();
        $roles = Staff::getAllRole();
        $rolesKey = Staff::getAllRoleInC_Staff();
        include_once "view/staff.php";
    }
    else
        echo "<script>window.open('index.php','_self')</script>";
?>

<!-- chỉnh sửa thông tin thành viên -->
<script type="text/javascript">
    function editStaff(maND)
    {
        console.log("Bắt đầu chỉnh sửa nhân viên: " + maND);
        let data = {};
        data.name = "getStaffWithID";
        data.maND = maND;
        $.ajax({
            type: "POST",
            url: "./models/M_Staff_Port.php",
            data: {
                data: JSON.stringify(data)
            },
            success: function (response) {
                response = JSON.parse(response);
                console.log("Dữ liệu trả về: ")
                console.log(response);
                document.getElementById("idStaff").value = response[0]['MaND'];
                document.getElementById("nameStaff").value = response[0]['HoTen'];
                document.getElementById("sexStaff").value = response[0]['GioiTinh'];
                document.getElementById("birthStaff").value = response[0]['NgaySinh'];
                document.getElementById("emailStaff").value = response[0]['Email'];
                document.getElementById("roleStaff").innerHTML = '';
                for (let i = 0; i < response[1].length; i++)
                {
                    $("#roleStaff").append(`<option value="${response[1][i]['MaCV']}">${response[1][i]['TenChucVu']}</option>`);
                }
                document.getElementById("roleStaff").value = response[0]['MaCV'];
            }
        });
    }

    var elementUpdateStaff = document.getElementById("btnUpdateStaff");
    elementUpdateStaff.addEventListener('click', function (param) {
        let data = {};
        data.name = "updateStaff";
        data.idStaff = document.getElementById("idStaff").value;
        data.nameStaff = document.getElementById("nameStaff").value;
        data.sexStaff = document.getElementById("sexStaff").value;
        data.birthStaff = document.getElementById("birthStaff").value;
        data.emailStaff = document.getElementById("emailStaff").value;
        data.roleStaff = document.getElementById("roleStaff").value;
        // for (let i = 0; i < $roles.length; i++)
        //     if (data.roleStaff == $roles[i])
        if (document.getElementById(data.roleStaff).classList.contains("fa-toggle-off"))
            data.stateRoleStaff = 0;
        else
            data.stateRoleStaff = -1;
        console.log("Bắt đầu chỉnh sửa nhân viên: ");
        console.log(data);
        Swal.fire({
                    // icon: "info",
                    title: "Đang cập nhật",
                    showConfirmButton: false
        });
        Swal.showLoading();
        $.ajax({
            type: "POST",
            url: "./models/M_Staff_Port.php",
            data: {
                data: JSON.stringify(data)
            },
            success: async function (response) {
                console.log("Tình trạng cập nhật: " + response);
                await sleep(500);
                Swal.close();
                Swal.fire({
                    icon: "success",
                    title: "Cập nhật thành công!",
                    timer: 700,
                    showConfirmButton: false
                })
                .then(()=>{
                    closeForm("modalStaff");
                });
            }
        });
    });

    var btnExitUpdateStaff = document.getElementById("btnExitUpdateStaff");
    btnExitUpdateStaff.addEventListener('click', function (param) { 
        closeForm("modalStaff");
    });

    // Cập nhật tình trạng tài khoản nhân viên
    function updateStateStaff(maND, maCV, state){  
        let data = {};
        data.maND = maND;
        data.name = "updateStateStaff";
        data.state = state;
        data.maCV = maCV;
        console.log("Yêu cầu cập nhật tình trạng tài khoản nhân viên: ");
        console.log(data);
        Swal.fire({
            // icon: "info",
            title: "Đang cập nhật",
            showConfirmButton: false,
        });
        Swal.showLoading();
        $.ajax({
            type: "POST",
            url: "./models/M_Staff_Port.php",
            data: {
                data: JSON.stringify(data)
            },
            success: async function (response) {
                console.log("Trạng thái cập nhật tình trạng: " + response);
                await sleep(300);
                if (response == 1)
                    window.location.reload();
                else
                {
                    Swal.fire({
                        icon: "warning",
                        title: "Mở khóa tài khoản thất bại",
                        text: "Bạn không thể mở khóa vì hiện tại chức vụ của tài khoản này đã bị vô hiệu hóa",
                        timer: 10000
                    });
                }
            }
        });
    }
</script>

<!-- Lưu lại session tìm kiếm -->
<script type="text/javascript">
    var elementInputFindStaff = document.getElementById("inputFindStaff");
    elementInputFindStaff.addEventListener('change', function (param) {
        console.log("Khung tìm kiếm nhân viên thay đổi: " + elementInputFindStaff.value);  
        sessionStorage.setItem("inputFindStaff",elementInputFindStaff.value);
        let data = {};
        data.name = 'updateSession';
        data.id = 'inputFindStaff';
        data.value = elementInputFindStaff.value;
        $.ajax({
            type: "POST",
            url: "./models/M_Index_Port.php",
            data: {
                data: JSON.stringify(data)
            },
            success: function (response) {
                console.log("Trạng thái cập nhật session inputFindStaff: " + response);
                window.location.reload();
            }
        });
    })
</script>

<!-- Hiển thị tài khoản bị vô hiệu -->
<script type="text/javascript">
    var elementCheckboxShowAccountDisable = document.getElementById("checkboxShowAccountDisable");
    elementCheckboxShowAccountDisable.addEventListener('click', function (param) {  
        console.log("Thay đổi trạng thái hiển thị staff: " + elementCheckboxShowAccountDisable.checked);
        sessionStorage.setItem("checkboxShowAccountDisable", elementCheckboxShowAccountDisable.checked);
        let data = {};
        data.name = 'updateSession';
        data.id = 'checkboxShowAccountDisable';
        data.value =  elementCheckboxShowAccountDisable.checked;
        $.ajax({
            type: "POST",
            url: "./models/M_Index_Port.php",
            data: {
                data: JSON.stringify(data)
            },
            success: function (response) {
                console.log("Trạng thái cập nhật session checkboxShowAccountDisable: " + response);
                window.location.reload();
            }
        });
    });
</script>

<!-- Cập nhật trạng thái chức vụ -->
<script type="text/javascript">
    function updateStateRole(maCV, state) {  
        let data = {};
        data.name = 'updateStateRole';
        data.maCV = maCV;
        data.state = state;
        if (state == 0)
        {
            Swal.fire({
                title: 'Bạn muốn tiếp tục chứ?',
                text: "Việc vộ hiệu hóa chức vụ sẽ vô hiệu hóa tất cả các tài khoản có liên quan!\nKhôi phục chức vụ sẽ không thể khôi phục các tài khoản có liên quan, bạn phải thực hiện thủ công!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Vâng, tiếp tục!',
                cancelButtonText: 'Thoát'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: "Đang cập nhật",
                        showConfirmButton: false,
                    });
                    Swal.showLoading();
                    $.ajax({
                        type: "POST",
                        url: "./models/M_Staff_Port.php",
                        data: {
                            data: JSON.stringify(data)
                        },
                        success: async function (response) {
                            console.log("Phản hồi cập nhật tình trạng chức vụ: " + response);
                            if (data.state == 1)
                            {
                                await sleep(500);
                                Swal.close();
                                window.location.reload();
                                return;
                            }
                            data.name = "updateStateStaffWithRole";
                            $.ajax({
                                type: "POST",
                                url: "./models/M_Staff_Port.php",
                                data: {
                                    data: JSON.stringify(data)
                                },
                                success: async function (response) {
                                    console.log("Phản hồi cập nhật tình trạng thành viên có chức vụ: " + response);
                                    await sleep(500);
                                    Swal.close();
                                    window.location.reload();

                                }
                            });
                        }
                    });
                }
            })
        }
        else
        {
            Swal.fire({
                title: "Đang cập nhật",
                showConfirmButton: false,
            });
            Swal.showLoading();
            $.ajax({
                type: "POST",
                url: "./models/M_Staff_Port.php",
                data: {
                    data: JSON.stringify(data)
                },
                success: async function (response) {
                    console.log("Phản hồi cập nhật tình trạng chức vụ: " + response);
                    if (data.state == 1)
                    {
                        await sleep(500);
                        Swal.close();
                        window.location.reload();
                        return;
                    }
                    data.name = "updateStateStaffWithRole";
                    $.ajax({
                        type: "POST",
                        url: "./models/M_Staff_Port.php",
                        data: {
                            data: JSON.stringify(data)
                        },
                        success: async function (response) {
                            console.log("Phản hồi cập nhật tình trạng thành viên có chức vụ: " + response);
                            await sleep(500);
                            Swal.close();
                            window.location.reload();

                        }
                    });
                }
            });
        }
        
    }
</script>

<!-- Chỉnh sửa chức vụ -->
<script type="text/javascript">
    function openModalEditRole(maCV) {  
        let elementDetailRoles = document.getElementsByClassName("detailRole");
        for (let i = 0; i < elementDetailRoles.length; i++)
        {
            elementDetailRoles[i].checked = false;
        }
        document.getElementById("titleModalDetailRoles").innerHTML = "Bảng phân quyền - " + maCV;
        let data = {};
        data.name = "getDetailRole";
        data.maCV = maCV;
        console.log("Đã gửi yêu cầu lấy danh sách phân quyền: ");
        console.log(data);
        Swal.fire({
            title: "Đang tải dữ liệu"
        });
        Swal.showLoading();
        $.ajax({
            type: "POST",
            url: "./models/M_Staff_Port.php",
            data: {
                data: JSON.stringify(data)
            },
            success: async function (response) {
                console.log("Danh sách phân quyền đã phản hồi: ");
                response = JSON.parse(response);
                console.log(response);
                await sleep(300);
                for (let i = 0; i < response.length; i++)
                {
                    document.getElementById(response[i]['TenPhanQuyen']).checked = true;
                }
                document.getElementById("btnUpdateDetailRole").onclick =  function (param) {  
                    updateDetailRole(maCV);
                }
                Swal.close();
            }
        });
    }

    function updateDetailRole(maCV)
    {
        let detailsRole = [];
        let elementDetailRoles = document.getElementsByClassName("detailRole");
        let count = 0;
        for (let i = 0; i < elementDetailRoles.length; i++)
        {
            if (elementDetailRoles[i].checked)
            {
                detailsRole[count] = elementDetailRoles[i].id;
                count++;
            }
        }
        let data = {};
        data.name = "updateDetailRole";
        data.value = detailsRole;
        // data.default = 
        data.maCV = maCV;
        data.default = document.getElementById("defaultRole").checked;
        console.log("Gửi yêu cầu cập nhật bảng phân quyền: ");
        console.log(data);
        Swal.fire({
            title: "Đang cập nhật",
            showConfirmButton: false
        });
        Swal.showLoading();
        $.ajax({
            type: "POST",
            url: "./models/M_Staff_Port.php",
            data: {
                data: JSON.stringify(data)
            },
            success: async function (response) {
                console.log("Tình trạng cập nhật bảng phân quyền: ");
                console.log(response);
                await sleep(500);
                Swal.close();
                window.location.reload();
            }
        });
    }
</script>

<!-- Thêm chức vụ -->
<script type="text/javascript">
    function addRole() {  
        Swal.fire({
            title: 'Nhập tên chức vụ mới',
            input: 'text',
            inputAttributes: {
                autocapitalize: 'off',
                style: "font-size: 15px"
            },
            showCancelButton: true,
            confirmButtonText: 'Thêm',
            cancelButtonText: 'Thoát',
            // showLoaderOnConfirm: true,
            // preConfirm: (login) => {
            //     return fetch(`//api.github.com/users/${login}`)
            //     .then(response => {
            //         if (!response.ok) {
            //         throw new Error(response.statusText)
            //         }
            //         return response.json()
            //     })
            //     .catch(error => {
            //         Swal.showValidationMessage(
            //         `Request failed: ${error}`
            //         )
            //     })
            // },
            allowOutsideClick: () => !Swal.isLoading()
            }).then((result) => {
            if (result.isConfirmed) {
                let data = {};
                data.name = "insertRole";
                data.tenChucVu = result.value.toString();
                console.log("Yêu cầu thêm chúc vụ: ");
                console.log(data);
                Swal.fire({
                    title: "Đang thêm dữ liệu",
                    showConfirmButton: false
                });
                Swal.showLoading();
                $.ajax({
                    type: "POST",
                    url: "./models/M_Staff_Port.php",
                    data: {
                        data: JSON.stringify(data)
                    },
                    success: async function (response) {
                        console.log(response);
                        await sleep(500);
                        Swal.close();
                        window.location.reload();
                    }
                });
            }
        })
    }
</script>