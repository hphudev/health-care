<!-- Nạp dữ liệu -->
<script type="text/javascript">
    Swal.fire({
        // icon: "info",
        title: "Đang tải trang",
        // text: "Bạn vui lòng đợi nhé!",
        // timer: 1000
    });
    Swal.showLoading();
</script>
<div class="container" style="position: relative">
    <h2 class="text-info">Quản lý thành viên</h2>
    <hr>
    <div class="container" style="display: flex; justify-content:space-between; width: 82vw">
        <div class="d-flex flex-row justify-content-center">
            <button class="btn btn-warning input-group-text fs-5 mb-3" id="btnReloadListStaff" style="font-weight: 500;" onclick="window.location.reload();" <?php  echo (!isset($_SESSION['inputFindStaff'])) ? "disabled" : "" ?>>Danh sách đầy đủ</button>
            <div class="form-check form-switch fs-3" style="margin-left: 20px;">
                <input class="form-check-input" type="checkbox" id="checkboxShowAccountDisable" <?php echo (isset($_SESSION['checkboxShowAccountDisable']) && $_SESSION['checkboxShowAccountDisable'] == true) ? "checked" : "" ?>>
                <label class="form-check-label" for="flexSwitchCheckDefault" style="text-shadow: 0 0 20px aqua; font-weight: 500">Hiển thị tài khoản bị vô hiệu</label>
            </div>
        </div>
        <div class="input-group mb-3" style="width:fit-content">
            <input id="inputFindStaff" style="max-width: 200px;" type="text" class="form-control fs-5"  aria-label="Nhập họ tên thành viên..." aria-describedby="basic-addon2" placeholder="Nhập họ tên thành viên...">
            <span class="btn btn-primary input-group-text fs-5" id="basic-addon2">Tìm kiếm</span>
        </div>
    </div>
    <div style="overflow: scroll; ">
        <table class="table table-hover fs-4 overflow-scroll" style="max-height: 400px">
                <thead class="table-dark">
                <tr>
                    <th scope="col" style="min-width: 30px;">#</th>
                    <th scope="col" style="min-width: 150px;">Mã Người dùng</th>
                    <th scope="col" style="min-width: 150px;">Họ và tên</th>
                    <th scope="col" style="min-width: 150px;">Giới tính</th>
                    <th scope="col" style="min-width: 150px;">Ngày sinh</th>
                    <!-- <th scope="col" style="min-width: 150px;">Số điện thoại</th> -->
                    <th scope="col" style="min-width: 150px;">Email</th>
                    <th scope="col" style="min-width: 150px;">Chức vụ</th>
                    <th scope="col" style="width: 20px;"></th>
                    <th scope="col" style="width: 20px;"></th>
                    <th scope="col" style="width: 20px;"></th>
                    <th scope="col" style="width: 30px;"></th>
                    <!-- <th scope="col" style="min-width: 50px;"></th> -->
                </tr>
            </thead>
            <tbody>
                <?php 
                $count = 0;
                    for ($i = 0; $i < count($staffs); $i++)
                    {
                        
                        // if (session_status() === PHP_SESSION_NONE) 
                        //     session_start();
                        // if (isset($_SESSION['inputFindStaff']))
                        //     echo '<script> alert("' . strpos(strtolower(strval($staffs[$i]->get_HoTen())), strtolower(strval($_SESSION['inputFindStaff']))) . ' ' . strtolower($staffs[$i]->get_HoTen()) . ' ' .  strtolower($_SESSION['inputFindStaff']) .'") </script>';
                        
                        // echo mb_strtolower(strval($staffs[$i]->get_HoTen()));
                        if (isset($_SESSION['inputFindStaff']) && !is_numeric(strpos(mb_strtolower($staffs[$i]->get_HoTen()), mb_strtolower($_SESSION['inputFindStaff']))))
                            continue;
                        if (isset($_SESSION['checkboxShowAccountDisable']) && $_SESSION['checkboxShowAccountDisable'] == true && $staffs[$i]->get_TinhTrang() == true)
                            continue;
                        if (isset($_SESSION['checkboxShowAccountDisable']) && $_SESSION['checkboxShowAccountDisable'] == false && $staffs[$i]->get_TinhTrang() == false)
                            continue;
                        $count++;
                        // if (strpos('are', 'f') == '')
                        //     continue;
                ?>
                    <tr>
                        <th scope="row"><?php echo $count ?></th>
                        <td><?php echo $staffs[$i]->get_MaND() ?></td>
                        <td><?php echo $staffs[$i]->get_HoTen() ?></td>
                        <td><?php echo $staffs[$i]->get_GioiTinh() ?></td>
                        <td>
                            <?php 
                                $time = strtotime($staffs[$i]->get_NgaySinh());
                                $newformat = date('d-m-Y', $time);
                                echo $newformat;
                            ?>
                        </td>
                        <td><?php echo $staffs[$i]->get_Email() ?></td>
                        <td><?php echo $rolesKey[$staffs[$i]->get_MaCV()] ?></td>
                        <!-- <td>
                            <button type="button" data-bs-target="#modalStaff" data-bs-toggle="modal" data-bs-dismiss="modal" class="btn btn-info btn-sm" title="Xem">
                                <i class="fas fa-info-circle"></i>
                            </button>
                        </td> -->
                        <td>
                            <button id="btnEditStaff" type="button" data-bs-target="#modalStaff" data-bs-toggle="modal" data-bs-dismiss="modal" class="btn btn-warning btn-sm" title="Sửa" onclick="editStaff('<?php echo $staffs[$i]->get_MaND() ?>');">
                                <i class="fas fa-pen"></i>
                            </button>
                        </td>
                        <td>
                            <button id="btnChangeStateStaff" type="button" class="btn btn-<?php echo ($staffs[$i]->get_TinhTrang() == 1) ? 'success' : 'danger' ?> btn-sm" onclick="updateStateStaff('<?php echo $staffs[$i]->get_MaND() ?>', '<?php echo $staffs[$i]->get_MaCV() ?>','<?php echo abs(1 - intval($staffs[$i]->get_TinhTrang())) ?>')">
                                <i class="fas fa-toggle-<?php echo ($staffs[$i]->get_TinhTrang() == 1) ? 'on' : 'off' ?>"></i>
                            </button>
                        </td>
                    </tr>
                <?php 
                    }
                ?>
            </tbody>
        </table>
    </div>
    <hr>
    <h2 class="text-info mt-2">Quản lý chức vụ</h2>
    <hr>
    <div style="display: flex; justify-content:space-between; width: 82vw">
        <button class="btn btn-success input-group-text fs-5 mb-3" id="btnReloadListStaff" onclick="addRole();">Thêm chức vụ</button>
        <!-- <div class="input-group mb-3" style="width:fit-content">
            <input id="inputFindStaff" style="max-width: 200px;" type="text" class="form-control fs-5"  aria-label="Nhập họ tên thành viên..." aria-describedby="basic-addon2" placeholder="Nhập họ tên thành viên...">
            <span class="btn btn-primary input-group-text fs-5" id="basic-addon2">Tìm kiếm</span>
        </div> -->
    </div>
    <div style="overflow: scroll; width: 100%; position: relative; margin-bottom: 20%">
        <table class="table table-hover fs-4 overflow-scroll" style="max-height: 400px">
                <thead class="table-success">
                <tr>
                    <th scope="col" style="min-width: 30px;">#</th>
                    <th scope="col" style="min-width: 150px;">Mã chức vụ</th>
                    <th scope="col" style="min-width: 150px;">Tên chức vụ</th>
                    <th scope="col" style="width: 20px;"></th>
                    <th scope="col" style="width: 20px;"></th>
                    <th scope="col" style="width: 20px;"></th>
                    <th scope="col" style="width: 30px;"></th>
                    <th scope="col" style="width: 30px;"></th>
                    <!-- <th scope="col" style="min-width: 50px;"></th> -->
                </tr>
            </thead>
            <tbody>
                <?php 
                    // $keys = array_keys($roles);   
                    for ($i = 0; $i < count($roles); $i++)
                    {
                        
                        // if (session_status() === PHP_SESSION_NONE) 
                        //     session_start();
                        // if (isset($_SESSION['inputFindStaff']))
                        //     echo '<script> alert("' . strpos(strtolower(strval($staffs[$i]->get_HoTen())), strtolower(strval($_SESSION['inputFindStaff']))) . ' ' . strtolower($staffs[$i]->get_HoTen()) . ' ' .  strtolower($_SESSION['inputFindStaff']) .'") </script>';
                        
                        // echo mb_strtolower(strval($staffs[$i]->get_HoTen()));
                        // if (isset($_SESSION['inputFindStaff']) && !is_numeric(strpos(mb_strtolower($staffs[$i]->get_HoTen()), mb_strtolower($_SESSION['inputFindStaff']))))
                        //     continue;
                        // $count++;
                        // if (strpos('are', 'f') == '')
                        //     continue;
                ?>
                    <tr>
                        <th scope="row"><?php echo $i + 1 ?></th>
                        <td ><?php echo $roles[$i]['MaCV'] ?></td>
                        <td ><?php echo $roles[$i]['TenChucVu'] ?></td>
                        <!-- <td>
                            <button type="button" data-bs-target="#modalStaff" data-bs-toggle="modal" data-bs-dismiss="modal" class="btn btn-info btn-sm" title="Xem">
                                <i class="fas fa-info-circle"></i>
                            </button>
                        </td> -->
                        <td>
                            <button id="btnEditRole" type="button" data-bs-target="#modalEditRole" data-bs-toggle="modal" data-bs-dismiss="modal" class="btn btn-warning btn-sm" title="Sửa" onclick="openModalEditRole('<?php echo $roles[$i]['MaCV']?>');">
                                <i class="fas fa-pen"></i>
                            </button>
                        </td>
                        <td>
                            <button id="btnChangeStateRole" type="button" class="btn btn-<?php echo ($roles[$i]['TinhTrang'] == 1) ? 'success' : 'danger' ?> btn-sm" onclick="updateStateRole('<?php echo $roles[$i]['MaCV']?>', '<?php echo abs(1 - intval($roles[$i]['TinhTrang'])) ?>')">
                                <i id="<?php echo $roles[$i]['MaCV'] ?>" class="fas fa-toggle-<?php echo ($roles[$i]['TinhTrang'] == 1) ? 'on' : 'off' ?>"></i>
                            </button>
                        </td>
                        <td>
                            <i class="fas fa-key text-danger <?php echo ($roles[$i]['MacDinh'] == 0 ? "d-none" : "") ?>" title="Mặc định"></i>
                        </td>
                    </tr>
                <?php 
                    }
                ?>
            </tbody>
        </table>
    </div>

    <!-- <button class="btn btn-light" data-bs-target="#modalStaff" data-bs-toggle="modal" data-bs-dismiss="modal"><span style="color: #12b33a; font-weight: 700;">Đăng ký ngay</span>
    </button> -->
    <div class="modal fade" id="modalStaff" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-lg" style="width: 45%; position: absolute; left: 50%; top:50%; transform: translate(-50%, -50%)">
            <div class="modal-content" style="padding: 0;">
                <div class="modal-body" style="padding: 0;">
                    <div class="row">
                        <div class="col">
                            <div class="row">
                                <div class="col w-20" style="display: block; font-size: 2rem; margin: 20px 0 20px 20px; width:150px; border: 0.5px solid #bdbdbd; border-radius: 20px; text-align: center;">
                                    <span style="color: #12b33a; font-weight: 700;">Health</span>
                                    <span style="color: #0085FF; font-weight: 700;">care</span>
                                </div>
                                <div class="col" style="text-align: center;  margin: 20px 20px 20px 5px; font-size: 2rem;">   
                                    <span style="color: #12b33a; font-weight: 700;">Quản trị</span>
                                </div>
                                <div style="width:100%; text-align: center; margin-top: 10%; text-shadow: 0 0 10px #5BA9F1; color: black" >
                                    <h3>Ảnh đại diện của bạn</h3>
                                </div>
                                <img class="rounded-circle" src="./sources/img/heathyLeftLogo.jpg" alt="" style="width:100px; height: 100px; border: 2px solid #42a5f5; margin-top: 3%; margin-left: 50%; margin-bottom: 5%; transform: translateX(-50%)">
                                <div class="input-group mb-3 d-flex justify-content-center" style="text-align: center; width: 100%">
                                    <input type="file" class="form-control d-none" id="inputGroupFile02">
                                    <label class="input-group-text btn-primary" for="inputGroupFile02" style="cursor: pointer; border-radius: 10px">Cập nhật ảnh đại diện</label>
                                </div>
                                <div style="margin:10px">
                                    <h5>Bạn đang thực hiện chức năng cập nhật thông tin thành viên...</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col center-block" style="text-align: center; padding: 25px">
                            <form>
                                <label for="" class="col-form-label" style="left: 50%; font-size: 18px; font-weight: bold;">Chỉnh sửa thành viên</label>
                                <div class="mb-1">
                                    <!-- <label for="recipient-name" class="col-form-label">:</label> -->
                                    <div class="input-group has-feedback">
                                        <span class="input-group-text bg-header text-light" style="width: 105px;">Mã người dùng</span>
                                        <input type="text" class="form-control" style=" font-size: 1.6rem" id="idStaff" disabled>
                                    </div>  
                                </div>
                                <div class="mb-1">
                                    <!-- <label for="recipient-name" class="col-form-label">:</label> -->
                                    <div class="input-group has-feedback">
                                        <span class="input-group-text bg-header text-light" style="width: 105px;">Họ và tên</span>
                                        <input type="text" class="form-control" style=" font-size: 1.6rem" id="nameStaff">
                                    </div>  
                                </div>
                                <div class="mb-1">
                                    <!-- <label for="recipient-name" class="col-form-label">:</label> -->
                                    <div class="input-group has-feedback">
                                        <span class="input-group-text bg-header text-light" style="width: 105px;">Giới tính</span>
                                        <select class="form-select" id="sexStaff" name="sellist1" style="font-size: 1.6rem;">
                                            <option>Nam</option>
                                            <option>Nữ</option>
                                        </select>
                                    </div>  
                                </div>
                                <div class="mb-1">
                                    <!-- <label for="recipient-name" class="col-form-label">:</label> -->
                                    <div class="input-group has-feedback">
                                        <span class="input-group-text bg-header text-light" style="width: 105px;">Ngày sinh</span>
                                        <input type="date" class="form-control" style=" font-size: 1.6rem" id="birthStaff">
                                        <!-- <input type="date" class="datepicker" /> -->
                                    </div>  
                                </div>
                                <!-- <div class="mb-1">
                                    <div class="input-group has-feedback">
                                        <span class="input-group-text bg-header text-light" style="width: 105px;">Số điện thoại</span>
                                        <input type="number" class="form-control" style =" font-size: 1.6rem" id="phoneStaff">
                                    </div>  
                                </div> -->
                                <div class="mb-1">
                                    <!-- <label for="recipient-name" class="col-form-label">:</label> -->
                                    <div class="input-group has-feedback">
                                        <span class="input-group-text bg-header text-light" style="width: 105px;">Email</span>
                                        <input type="text" class="form-control" style=" font-size: 1.6rem" id="emailStaff">
                                    </div>  
                                </div>
                                <!-- <div class="mb-1">
                                    <div class="input-group has-feedback">
                                        <span class="input-group-text bg-header text-light" style="width: 105px;">Tên đăng nhập</span>
                                        <input type="text" class="form-control" style=" font-size: 1.6rem" id="recipient-name">
                                    </div>  
                                </div> -->
                                <div class="input-group has-feedback">
                                        <span class="input-group-text bg-header text-light" style="width: 105px;">Chức vụ</span>
                                        <select class="form-select" id="roleStaff" name="sellist1" style="font-size: 1.6rem;">
                                            <option>Nhân viên</option>
                                            <option>Chạy grap</option>
                                        </select>
                                </div>  
                                <!-- <div class="mb-1">
                                    <div class="input-group has-feedback">
                                        <span class="input-group-text bg-header text-light" style="width: 105px;">Mật khẩu</span>
                                        <input type="password" class="form-control" style=" font-size: 1.6rem" id="recipient-name">
                                    </div>
                                </div>
                                <div class="mb-1">
                                    <div class="input-group has-feedback">
                                        <span class="input-group-text bg-header text-light" style="width: 105px;">Xác nhận mật khẩu</span>
                                        <input type="password" class="form-control" style="font-size: 1.6rem;" id="recipient-name">
                                    </div>
                                </div> -->
                                <div class="mb-3 pt-1">
                                    <Button id="btnUpdateStaff" type="button" class="btn btn-lg btn-primary w-100 fw-bold" style="border-radius: 1.6rem; font-size: 1.6rem;">Cập nhật</Button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                    <div class="modal-footer">
                        <div>
                            <div class="col" style="margin-left: 10%;">
                                <button id="btnExitUpdateStaff" class="btn btn-danger"><span style="color: white; font-weight: 700;">Thoát</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="modalEditRole" class="modal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 id="titleModalDetailRoles" class="modal-title fs-2 text-warning">Chức vụ - Bảng phân quyền</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h5 class="fs-3">Quản lý nhân viên</h5>
                        <div class="form-check" style="margin-left: 5%;">
                            <input class="detailRole form-check-input fs-4" type="checkbox" value="" id="staff_1">
                            <label class="form-check-label fs-4" for="flexCheckDefault">
                                Xem trang quản lý nhân viên
                            </label>
                        </div>
                        <div class="form-check" style="margin-left: 5%;">
                            <input class="detailRole form-check-input fs-4" type="checkbox" value="" id="staff_2">
                            <label class="form-check-label fs-4" for="flexCheckDefault">
                                Chỉnh sửa thông tin nhân viên
                            </label>
                        </div>
                        <div class="form-check" style="margin-left: 5%;">
                            <input class="detailRole form-check-input fs-4" type="checkbox" value="" id="staff_3">
                            <label class="form-check-label fs-4" for="flexCheckDefault">
                                Chỉnh sửa tình trạng nhân viên
                            </label>
                        </div>
                    <hr>
                    <h5 class="fs-3">Quản lý bài viết</h5>
                        <div class="form-check" style="margin-left: 5%;">
                            <input class="detailRole form-check-input fs-4" type="checkbox" value="" id="article_1">
                            <label class="form-check-label fs-4" for="flexCheckDefault">
                                Xem trang quản lý bài viết
                            </label>
                        </div>
                        <div class="form-check" style="margin-left: 5%;">
                            <input class="detailRole form-check-input fs-4" type="checkbox" value="" id="article_2">
                            <label class="form-check-label fs-4" for="flexCheckDefault">
                                Phê duyệt hoặc không phê duyệt bài viết
                            </label>
                        </div>
                    <hr>
                    <h5 class="fs-3">Bài viết của tôi</h5>
                        <div class="form-check" style="margin-left: 5%;">
                            <input class="detailRole form-check-input fs-4" type="checkbox" value="" id="writer_1">
                            <label class="form-check-label fs-4" for="flexCheckDefault">
                                Xem trang bài viết của tôi
                            </label>
                        </div>
                        <div class="form-check" style="margin-left: 5%;">
                            <input class="detailRole form-check-input fs-4" type="checkbox" value="" id="writer_2">
                            <label class="form-check-label fs-4" for="flexCheckDefault">
                                Viết bài
                            </label>
                        </div>
                    <hr>
                    <h5>Chức vụ mặc định</h5>
                    <div class="form-check" style="margin-left: 5%;">
                            <input id="defaultRole" class="form-check-input fs-4" type="checkbox" value="" id="writer_2">
                            <label class="form-check-label fs-4" for="flexCheckDefault">
                                Chỉ định làm mặc định
                            </label>
                    </div>
                    <p>Chức vụ mặc định là chức vụ sẽ được xét mặc định khi đăng ký tài khoản<./p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    <button id="btnUpdateDetailRole" type="button" class="btn btn-primary">Cập nhật</button>
                </div>
                </div>
            </div>
        </div>
        
        <!-- <a class="btn btn-primary" data-bs-toggle="modal" href="#exampleModalToggle" role="button">Open first modal</a>           -->
    </div>
</div>
<script type="text/javascript">
    setTimeout(() => {
        Swal.close();
    }, 250);
</script>
<?php
    // if (isset($_SESSION['inputFindStaff']))
    if (session_status() === PHP_SESSION_NONE) 
        session_start();
    if (isset($_SESSION['inputFindStaff']))
        unset($_SESSION['inputFindStaff']);
?>