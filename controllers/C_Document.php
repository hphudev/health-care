<?php 
    include_once './models/M_Document_Port.php';
    // session_start();
    if (isset($_SESSION['IDUser']))
    {
        // echo "<script> alert('" . strval($_SESSION['IDUser']) . "'); </script>";
        include_once("./view/document.php");
    }
    else
        echo "<script>window.open('index.php','_self')</script>";
    // die();
?>
<!-- Chọn topic -->
<script type="text/javascript">

    var elementTopicArticles = document.getElementsByClassName("topicArticle");
    for (let i = 0; i < elementTopicArticles.length; i++)
    {
        elementTopicArticles[i].addEventListener('click', function (event){
            document.getElementById('btnTopic').innerHTML = elementTopicArticles[i].innerHTML;
        });
    }
</script>
<!-- Chức năng gửi bài viết đi xét duyệt -->
<script type="text/javascript">
    var elementSendArticle = document.getElementById('btnSendArticle');
    elementSendArticle.addEventListener('click', function (event) { 
        let data = {};
        data.title = document.getElementById('headerArticle').value;
        data.describe = document.getElementById('describeArticle').value;
        data.content = CKEDITOR.instances['editor'].getData().toString();
        data.TenLBV = document.getElementById('btnTopic').textContent;
        data.MaTacGia = 'null';
        data.LuotXem = 0;
        data.TbSao = 0;
        data.TinhTrang = 0;
        data.name = "sendArticle";
        console.log("Đã gửi xét duyệt bài viết: " + JSON.stringify(data));
        $.ajax({
            type: "POST",
            url: "models/M_Document_Port.php",
            data: {data: JSON.stringify(data)},
            success: function (response) {
                console.log("Tình trạng gửi: " + response);
            }
        });
    });
</script>