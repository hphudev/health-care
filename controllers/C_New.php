
<?php 
    include_once "./models/M_Document_Port.php";

    if (isset($_REQUEST['mabv']))
    {
        $result = Document::getDocument($_REQUEST['mabv']);
        $result =  convertDocument($result);
        include_once "./view/news.php";

    }
?>
<!-- <script type="text/javascript">

</script> -->