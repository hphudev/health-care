<?php
    if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
        $url = 'https://';
    else
        $url = 'http://';
    $url .= $_SERVER['HTTP_HOST'] . 'index.php';
    $url .= $_SERVER['REQUEST_URI'] . 'index.php';
    // if (session_id() === '')
        session_start();
    //print_r($url);
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.css">
    <title>Chăm sóc sức khỏe</title>
    <link rel="stylesheet" href="./css/bootstrap-5/css/bootstrap.css">
    <link rel="stylesheet" href="./css/bootstrap-5/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./owlcarousel/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="./owlcarousel/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="./sources/fontawesome-free-5.15.4-web/css/all.css">
    <link rel="stylesheet" href="./sources/fontawesome-free-5.15.4-web/js/all.js">
    <link rel="stylesheet" href="./css/asset/base.css">
    <link rel="stylesheet" href="./css/asset/main.css">
    <!-- <script src="./ckeditor5-build-decoupled-document/ckeditor.js"></script> -->
    <script src="./ckeditor2/ckeditor.js"></script>
    <script src="./ckfinder/ckfinder.js"></script>
    <script src="./ckeditor2/plugins/lineheight/"></script>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/jquery-migrate-3.3.2.js"></script>
    <script src="./js/smtp/smtp.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="./js/dpmaster/themes/jquery-ui.css">
    <script src="./js/dpmaster/jquery-ui.js"></script>
    <script src="./js/dpmaster/jquery.ui.datepicker-vi.js"></script>
    <!-- <script src="https://jquery-ui.googlecode.com/svn-history/r3982/trunk/ui/i18n/jquery.ui.datepicker-vi.js"></script> -->
    <!-- <script src="https://jquery-ui.googlecode.com/svn-history/r3982/trunk/ui/i18n/jquery.ui.datepicker-nl.js"></script> -->
    <!-- <link rel="stylesheet" href="extensions/sticky-header/bootstrap-table-sticky-header.css">
    <script src="extensions/sticky-header/bootstrap-table-sticky-header.js"></script> -->
    <!-- <script src="./tableresize_4.17.1/tableresize/plugin.js"> </script> -->
    <!-- <script src="./controllers/C_Index.php"></script> -->
    <style>
        .checked-star{
            color: orange;
        }
        .star-scale{
            transform: scale(2);
            padding-right: 10px;
        }
        .topicArticle{
            cursor: pointer;
        }
        body{
            overflow: auto;
        }
        body {
            -ms-overflow-style: none; /* for Internet Explorer, Edge */
            scrollbar-width: none; /* for Firefox */
            /* overflow-y: scroll;  */
        }

        body::-webkit-scrollbar {
            display: none; /* for Chrome, Safari, and Opera */
        }

    </style>
</head>

<body>
    <div class="container-fluid p-0" style="">
        <div class="containter _header">
            <div class="row bg-header">
                <div class="_header__nav col">
                    <ul class="_header__nav-list text-light fs-4 fw-bold list-unstyled d-flex justify-content-end">
                        <li class="p-3">
                            <a id="btnMenuManageStaff" class="btn text-light fs-4 fw-bold d-none" data-bs-toggle="modal" href="./index.php?page=staff" role="button">
                                <i class="fas fa-users"></i>
                                Quản lý thành viên
                             </a> 
                        </li>
                        <li class="p-3">
                            <a id="btnMenuManageArticle" class="btn text-light fs-4 fw-bold d-none" data-bs-toggle="modal" href="./index.php?page=document" role="button">
                                <i class="far fa-newspaper"></i>
                                Quản lý bài viết
                            </a> 
                        </li>
                        <li class="p-3">
                            <a id="btnMenuMyArticle" class="btn text-light fs-4 fw-bold d-none" data-bs-toggle="modal" href="./index.php?page=document" role="button">
                                <i class="fas fa-newspaper"></i>
                                Bài viết của tôi
                            </a> 
                        </li>
                        <li id="btnMenuMyAccount" class="p-3 d-none">
                            <div class="dropdown">
                                <a id="btnMyAccountDropDown" class="btn dropdown-toggle text-light fs-4 fw-bold" data-bs-toggle="dropdown" aria-expanded="false" type="button">
                                    <i class="fas fa-user"></i>
                                    Tài khoản của bạn
                                </a> 
                                <ul class="dropdown-menu fs-3" style="border-radius: 10px;" aria-labelledby="#btnMyAccountDropDown">
                                    <li><a class="dropdown-item p-3" href="#">Thông tin tài khoản</a></li>
                                    <li><a class="dropdown-item p-3" href="#">Quên mật khẩu</a></li>
                                    <li id="btnMenuSignOut"><a class="dropdown-item p-3 text-danger" style="font-weight: 500;" href="#">Đăng xuất</a></li>
                                </ul>
                            </div>
                        </li>
                        <li id="btnMenuSignIn" class="p-3">
                            <i class="fas fa-sign-in-alt"></i>
                            <a class="btn text-light fs-4 fw-bold" data-bs-toggle="modal" href="#exampleModalToggle" role="button">Đăng nhập</a> 
                        </li>
                        <li id="btnMenuSignUp" class="p-3">
                            <i class="fas fa-user-plus"></i>
                            <a class="btn text-light fs-4 fw-bold" data-bs-toggle="modal" href="#exampleModalToggle2" role="button">Đăng ký</a> 
                        </li>
                    </ul>
                </div>
            </div>
            <div class="row m-2">
                <div class="_header__nav col" style="position: relative;">
                    <a href="./index.php?page=home" style="text-decoration: none;">
                        <img src="./sources/img/logo.jpg" alt="Logo web site" width="64px" height="auto">
                        <div class="fs-2" style="float: left;position: absolute; top:50%; left: 70px;">
                            <span style="color: #12b33a; font-weight: 700;">Health</span>
                            <span style="color: #0085FF; font-weight: 700;">care</span>
                        </div>  

                    </a>
                    <ul class="_header__nav-list nav-list--menu text-dark fw-bold fs-2 list-unstyled d-flex justify-content-center" style="position: absolute; top:70%; left:50%; transform: translate(-50%, -50%); font-family: 'Times New Roman', Times, serif;">
                        <li class="p-4">
                            <span>Sức khỏe</span>
                            <a href=""></a>
                        </li>
                        <li class="p-4">
                            <span>Đời sống</span>
                            <a href=""></a>
                        </li>
                        <li class="p-4">
                            <span>Dược phẩm</span>
                            <a href=""></a>
                        </li>
                        <li class="p-4">
                            <span>Sơ cấp cứu</span>
                            <a href=""></a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="row m-4">
                <div class="_header__nav-slider col">
                    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                        <div class="_header__nav-slider-content carousel-inner fs-3 bg-slider h-150 text-center" style="border-radius: 20px; ">
                            <div class="carousel-item active p-2 " data-bs-interval="2000">
                                <a class="text-light text-decoration-none" href="">
                                    Tình hình dịch bệnh ngày 12/11/2021
                                </a>
                            </div>
                            <div class="carousel-item p-2" data-bs-interval="2000">
                                <a class="text-light text-decoration-none" href="">
                                    Khi trẻ tiêm vaccine phòng COVID-19 cha mẹ cần chuẩn bị gì?
                                </a>
                            </div>
                            <div class="carousel-item p-2" data-bs-interval="2000">
                                <a class="text-light text-decoration-none" href="">
                                    Làm thế nào để phòng ngừa cao huyết áp?
                                </a>
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Phần thân -->
        <div class="container mt-5 d-flex flex-column justify-content-center" style="position: relative;">
            <div id="pageManage" class="container">
                <?php 
                    if (isset($_REQUEST['page']))
                    {
                        $page = $_REQUEST['page'];
                        switch ($page) {
                            case 'home':
                                include_once 'view/home.php';
                                break;
                            case 'news':
                                include_once './controllers/C_New.php';
                                break;
                            case 'document':
                                include_once './controllers/C_Document.php';
                                break;
                            case 'staff':
                                include_once './controllers/C_Staff.php';
                                break;
                            case 'my-article':
                                include_once './controllers/C_MyArticle.php';
                                break;
                            default:
                                include_once 'view/home.php';
                                break;
                        }
                    }
                    else
                        include_once 'view/home.php';
                ?>  
            </div>
            
            <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered modal-lg" style="width: 45%; position: absolute; left: 50%; top:50%; transform: translate(-50%, -50%)">
                    <div class="modal-content" style="padding: 0;">
                    <!-- <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalToggleLabel">Modal 1</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div> -->
                    <div class="modal-body" style="padding: 0;">
                        <div class="row">
                            <div class="col">
                                <img class="w-100 h-auto" src="./sources/img/heathyLeftLogo.jpg" alt="" style="border-radius: 1.6rem 1.6rem 1.6rem 0;">
                                <div class="row">
                                    <div class="col w-20" style="display: block; font-size: 2rem; margin: 20px 0 20px 20px; width:150px; border: 0.5px solid #bdbdbd; border-radius: 20px; text-align: center;">
                                        <span style="color: #12b33a; font-weight: 700;">Health</span>
                                        <span style="color: #0085FF; font-weight: 700;">care</span>
                                    </div>
                                    <div class="col" style="text-align: center;  margin: 20px 20px 20px 5px; font-size: 2rem;">   
                                        <span style="color: #12b33a; font-weight: 700;">Xin chào!</span>
                                    </div>
                                    <div style="margin:10px">
                                        <h5>Hãy đăng nhập để chúng tôi có thể chăm sóc bạn tốt hơn...</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col center-block" style="text-align: center; padding: 25px">
                                <form>
                                    <label for="" class="col-form-label" style="left: 50%; font-size: 18px; font-weight: bold;">Đăng nhập</label>
                                    <div class="mb-3 pt-5">
                                        <!-- <label for="recipient-name" class="col-form-label">:</label> -->
                                        <div class="input-group has-feedback">
                                            <span class="input-group-text bg-header text-light" style="width: 80px;">Tên đăng nhập</span>
                                            <input type="text" class="form-control fs-2" id="usernameSignIn">
                                        </div>  
                                    </div>
                                    <div class="mb-3 pt-1">
                                        <div class="input-group has-feedback">
                                            <span class="input-group-text bg-header text-light" style="width: 80px;">Mật khẩu</span>
                                            <input type="password" class="form-control fs-2" id="passwordSignIn">
                                        </div>
                                    </div>
                                    <div class="mb-3 pt-1">
                                        <Button id="btnSignIn" type="button" class="btn btn-lg btn-primary w-100 fw-bold" style="border-radius: 1.6rem; font-size: 1.6rem;">ĐĂNG NHẬP</Button>
                                    </div>
                                    <a id="forgotPassword" class="fs-4" href="">Quên mật khẩu?</a>
                                </form>
                            </div>
                        </div>
                    </div>
                        <div class="modal-footer">
                            <div>
                                <div class="col">
                                    Bạn chưa có tài khoản Health care?
                                </div>
                                <div class="col" style="margin-left: 10%;">
                                    <button class="btn btn-light" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal" data-bs-dismiss="modal"><span style="color: #12b33a; font-weight: 700;">Đăng ký ngay</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered modal-lg" style="width: 45%; position: absolute; left: 50%; top:50%; transform: translate(-50%, -50%)">
                    <div class="modal-content" style="padding: 0;">
                        <div class="modal-body" style="padding: 0;">
                            <div class="row">
                                <div class="col">
                                    <img class="w-100 h-auto" src="./sources/img/heathyLeftLogo.jpg" alt="" style="border-radius: 1.6rem 1.6rem 1.6rem 0;">
                                    <div class="row">
                                        <div class="col w-20" style="display: block; font-size: 2rem; margin: 20px 0 20px 20px; width:150px; border: 0.5px solid #bdbdbd; border-radius: 20px; text-align: center;">
                                            <span style="color: #12b33a; font-weight: 700;">Health</span>
                                            <span style="color: #0085FF; font-weight: 700;">care</span>
                                        </div>
                                        <div class="col" style="text-align: center;  margin: 20px 20px 20px 5px; font-size: 2rem;">   
                                            <span style="color: #12b33a; font-weight: 700;">Xin chào!</span>
                                        </div>
                                        <div style="margin:10px">
                                            <h5>Hãy đăng ký thành thành viên để chúng tôi có thể chăm sóc bạn tốt hơn...</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col center-block" style="text-align: center; padding: 25px">
                                    <form>
                                        <label for="" class="col-form-label" style="left: 50%; font-size: 18px; font-weight: bold;">Đăng ký</label>
                                        <div class="pt-3">
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
                                                    <option>LGBT</option>
                                                </select>
                                            </div>  
                                        </div>
                                        <div class="mb-1">
                                            <!-- <label for="recipient-name" class="col-form-label">:</label> -->
                                            <div class="input-group has-feedback">
                                                <span class="input-group-text bg-header text-light" style="width: 105px;">Ngày sinh</span>
                                                <input type="date" class="form-control" style=" font-size: 1.6rem" id="birthStaff">
                                            </div>  
                                        </div>
                                        <!-- <div class="mb-1">
                                            <div class="input-group has-feedback">
                                                <span class="input-group-text bg-header text-light" style="width: 105px;">Email</span>
                                                <input type="number" class="form-control" style=" font-size: 1.6rem" id="mailStaff">
                                            </div>  
                                        </div> -->
                                        <div class="mb-1">
                                            <!-- <label for="recipient-name" class="col-form-label">:</label> -->
                                            <div class="input-group has-feedback">
                                                <span class="input-group-text bg-header text-light" style="width: 105px;">Email</span>
                                                <input type="text" class="form-control" style=" font-size: 1.6rem" id="emailStaff">
                                            </div>  
                                        </div>
                                        <div class="mb-1">
                                            <!-- <label for="recipient-name" class="col-form-label">:</label> -->
                                            <div class="input-group has-feedback">
                                                <span class="input-group-text bg-header text-light" style="width: 105px;">Tên đăng nhập</span>
                                                <input type="text" class="form-control" style=" font-size: 1.6rem" id="usernameStaff">
                                            </div>  
                                        </div>
                                        <div class="mb-1">
                                            <div class="input-group has-feedback">
                                                <span class="input-group-text bg-header text-light" style="width: 105px;">Mật khẩu</span>
                                                <input type="password" class="form-control" style=" font-size: 1.6rem" id="passwordStaff">
                                            </div>
                                        </div>
                                        <div class="mb-1">
                                            <div class="input-group has-feedback">
                                                <span class="input-group-text bg-header text-light" style="width: 105px;">Xác nhận mật khẩu</span>
                                                <input type="password" class="form-control" style="font-size: 1.6rem;" id="confirmPasswordStaff">
                                            </div>
                                        </div>
                                        <div class="mb-3 pt-1">
                                            <Button id="btnSignUpOrEdit" type="button" class="btn btn-lg btn-primary w-100 fw-bold" style="border-radius: 1.6rem; font-size: 1.6rem;">ĐĂNG KÝ</Button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                            <div class="modal-footer">
                                <div>
                                    <div class="col">
                                        Bạn đã có tài khoản Health care?
                                    </div>
                                    <div class="col" style="margin-left: 10%;">
                                        <button class="btn btn-light" data-bs-target="#exampleModalToggle" data-bs-toggle="modal" data-bs-dismiss="modal"><span style="color: #12b33a; font-weight: 700;">Đăng nhập ngay</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <a class="btn btn-primary" data-bs-toggle="modal" href="#exampleModalToggle" role="button">Open first modal</a>           -->
            </div>
        <div class="footer bg-dark text-light" style="padding-left: 20%; padding-right: 20%; height: 250px; text-align: center;  padding-top: 2%; font-size: 1.6rem;">
            <div class="row introduce">
                <p>
                    <span style="color: #90db5e; font-weight: 700;">Health</span>
                    <span style="color: #0085FF; font-weight: 700;">care</span> được tạo ra vì mục đích phi lợi nhuận.
                    Sứ mệnh của chúng tôi là giúp mọi người có thêm các kiến thức bổ ích về bảo vệ sức khỏe, cũng như phòng, điều trị
                    hoặc sơ cấp cứu các vấn đề về sức khỏe. Chúng tôi luôn tiếp nhận phản hồi cũng như cộng tác từ các bạn. <br>
                    Hãy cùng đồng hành với chúng tôi!
                </p>
            </div>
            <div class="contact" style="display: flex; justify-content: center;">
                <a class="" href="https://www.facebook.com/odev.vn/" style="text-decoration: none; color: blanchedalmond; margin: 20px;">
                    <i class="fab fa-facebook" style="transform: scale(2);"></i>
                </a>
                <a class="" href="mailto:lhphu9a1@gmail.com" style="text-decoration: none; color: blanchedalmond; margin: 20px;">
                    <i class="fas fa-envelope" style="transform: scale(2);"></i>
                </a>
                <a class="" href="tel:+84965676841" style="text-decoration: none; color: blanchedalmond; margin: 20px;">
                    <i class="fas fa-phone-square-alt" style="transform: scale(2);"></i>
                </a>
            </div>
            <div class="text-light">
                ©2021 Copyright: <a class="text-decoration-none text-light" href="https://www.facebook.com/odev.vn/">hphudev</a>
            </div>
        </div>
    </div>
    <?php 
        include_once "./controllers/C_Index.php";
    ?>
     <!-- Messenger Plugin chat Code -->
     <div id="fb-root"></div>

    <!-- Your Plugin chat code -->
    <div id="fb-customer-chat" class="fb-customerchat">
    </div>

    <script>
        var chatbox = document.getElementById('fb-customer-chat');
        chatbox.setAttribute("page_id", "107839545068111");
        chatbox.setAttribute("attribution", "biz_inbox");

        window.fbAsyncInit = function() {
            FB.init({
            xfbml            : true,
            version          : 'v12.0'
            });
        };

        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="./js/bootstrap-5/js/bootstrap.js"></script>
    <script src="./js/bootstrap-5/js/bootstrap.bundle.min.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
    <script src="./owlcarousel/owl.carousel.min.js"></script>
    <script type="text/javascript">
        $('.owl-carousel').owlCarousel({
            loop: false,
            margin: 10,
            nav: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 5
                }
            }
        })
    </script>   
    <script type="text/javascript">
        $(function() {
            $( ".datepicker" ).datepicker( $.datepicker.regional['vi'] );
        });
    </script>


</body>

</html>