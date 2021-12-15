
<div class="container " style=" min-width: 750px; max-width:60%; position: relative;">
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <ol class="breadcrumb fs-2">
        <li class="breadcrumb-item"><a href="index.php?page=news&mabv=DO1">Sức khỏe</a></li>
        <li class="breadcrumb-item active" aria-current="page"><a href="#">Tình hình dịch Covid</a></li>
    </ol>
    </nav>

    <div class="card text-justify">
        <div class="card-header" style="text-align: right;">
            <div>
                <h2>Đánh giá</h2>
            </div>
            <span class="fa fa-star star-scale checked-star"></span>
            <span class="fa fa-star star-scale checked-star"></span>
            <span class="fa fa-star star-scale checked-star"></span>
            <span class="fa fa-star star-scale"></span>
            <span class="fa fa-star star-scale"></span>
        </div>
        <div class="card-body">
            <h5 id="titleArticle" class="card-title" style="font-size: 32px;"><?php echo $result['TieuDe']?></h5>
            <!-- <img src="./sources/img/vaccine.jpg" class="card-img-top" alt="..."> -->
            <p class="card-text pt-4" style="font-size: 18px;">
            <?php echo $result['NoiDung'] ?>
            <!-- Bố tôi bị cao huyết áp, có tiền sử tim mạch, chuẩn bị tiêm vaccine Covid-19. Bố nên ăn gì để ổn định đường huyết trước tiêm, tránh rối loạn đông máu? (Diệu Vy)
            <br>
            <br>
            Trả lời: Thông thường, người có các bệnh lý như bố bạn sẽ sử dụng thuốc thường xuyên. Do đó, lưu ý trong những ngày trước khi đi tiêm chúng ta phải uống thuốc đều đặn để duy trì thể trạng ổn định. Thứ hai, bạn nên theo dõi huyết áp thường xuyên bởi đôi khi chỉ số của người bệnh vẫn cao hơn bình thường dù có uống thuốc. Trong một số trường hợp, người bệnh phải uống liều thuốc cao hơn để ổn định huyết áp và tim mạch trong giai đoạn chuẩn bị đi tiêm để đảm bảo các tiêu chí khám sàng lọc trước tiêm.
            <br>
            <br>
            Thứ ba, người bệnh cần ngủ đủ giấc, ít nhất là một tuần trước khi tiêm. Những người lớn tuổi hay lo lắng, dẫn tới mất ngủ, huyết áp tăng lên. Do đó, bạn nên trấn an bố của mình để tránh tình trạng không được tiêm do huyết áp tăng bởi lo sợ.
            <br>
            <br>
            Khẩu phần ăn vẫn nên duy trì như hàng ngày, thậm chí, không cần phải bồi dưỡng thêm. Ngày đi tiêm, người bệnh nên ăn sáng đầy đủ trước khi đi. Sau khi tiêm, chế độ ăn cũng nên giữ nguyên. Trong trường hợp gặp các tác dụng phụ như nôn, sốt... bố bạn chỉ cần ăn đồ mềm hơn, không nhất thiết phải có chế độ ăn đặc biệt sau tiêm.-->
            </p> 
        </div>
        <div class="card-footer text-muted" style="text-align: right;">
        <a href="#" class="btn btn-dark text-warning">Đánh giá bài viết này</a>
        <br>
        <br>
            Tác giả: Tiến sĩ, bác sĩ Đào Thị Yến Phi<br>
            Đăng ngày 12/11/2021 
        </div>
    </div>
    <div>
        <!-- <label for="" class="col-form-label" style="left: 50%; font-size: 18px; font-weight: bold;">Đăng nhập</label> -->
        <div class="mb-3 pt-5">
            <div class="form-group">
                <label for="comment" class="fs-3" style="font-weight: 500;">Hãy cho chúng tôi biết suy nghĩ của bạn</label>
                <textarea class="form-control fs-3" rows="5" id="comment"></textarea>
            </div>
                <span class="input-group-text bg-header text-light fs-3 fw-bold" style="width: 80px; padding-left: 20px">
                    <a class="text-light" href="" style="text-decoration: none; width: fit-content">
                        Gửi
                     </a>
                </span>
        </div>
    </div>
    <div class="card">
        <div class="card-header fs-3">
            Bình luận liên quan
        </div>
        <div class="card-body">
            <div class="card mb-3" style="">
                <div class="row g-0 p-1">
                    <div class="col-md-1">
                        <img src="./sources/img/vaccine.jpg" class="img-fluid" alt="Hình ảnh">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body" style="padding: 5px;">
                            <h5 class="card-title">Lê Hoàng Phú</h5>
                            <p class="card-text">Bài viết này khá là hữu ích. Tôi rất thích bài viết này</p>
                            <p class="card-text"><small class="text-muted">Khoảng 3 phút trước</small></p>
                        </div>  
                    </div>
                </div>
            </div>
            <div class="card mb-3" style="">
                <div class="row g-0 p-1">
                    <div class="col-md-1">
                        <img src="./sources/img/vaccine.jpg" class="img-fluid" alt="Hình ảnh">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body" style="padding: 5px;">
                            <h5 class="card-title">Lê Hoàng Phú</h5>
                            <p class="card-text">Bài viết này khá là hữu ích. Tôi rất thích bài viết này</p>
                            <p class="card-text"><small class="text-muted">Khoảng 3 phút trước</small></p>
                        </div>  
                    </div>
                </div>
            </div>
            <div class="card mb-3" style="">
                <div class="row g-0 p-1">
                    <div class="col-md-1">
                        <img src="./sources/img/vaccine.jpg" class="img-fluid" alt="Hình ảnh">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body" style="padding: 5px;">
                            <h5 class="card-title">Lê Hoàng Phú</h5>
                            <p class="card-text">Bài viết này khá là hữu ích. Tôi rất thích bài viết này</p>
                            <p class="card-text"><small class="text-muted">Khoảng 3 phút trước</small></p>
                        </div>  
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr style="margin-top: 15px;"></hr>
    <h2>Bài viết liên quan</h2>
    <div class="card mb-3" style="">
        <div class="row g-0">
            <div class="col-md-3">
                <img src="./sources/img/vaccine.jpg" class="img-fluid rounded-start" alt="Hình ảnh">
            </div>
            <div class="col-md-8">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
            </div>
            </div>
        </div>
    </div>
</div>


