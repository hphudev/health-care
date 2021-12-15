<?php
    include "M_Document_Action.php";
    // include_once "../configs/configs.php";
    function convertDocument($resultFromServer)
    {
        if ($resultFromServer->num_rows > 0)
        {
            while ($row = $resultFromServer->fetch_assoc())
            {
                return array('MaBV' => $row['MaBV'], 'TieuDe' => $row['TieuDe'], 'MoTa' => $row['MoTa'], 'NoiDung' => $row['NoiDung'], 'NgayDang' => $row['NgayDang'], 'MaLBV' => $row['MaLBV'], 'MaTacGia' => $row['MaTacGia'], 'LuotXem' => $row['LuotXem'], 'TBSao' => $row['TBSao'], 'TinhTrang' => $row['TinhTrang']);
            }
        }
    }

    if (isset($_POST['data']))
    {
        $data = json_decode($_POST['data']);
        if (json_last_error() == JSON_ERROR_NONE)
        {
            // $result = array();
            // $result['data'] = 'trà sữa';
            // echo json_encode($result);
            if ($data->name == 'sendArticle')
            {
                echo json_encode(Document::sendDocument($data));
            }
            if ($data->name == 'getDocument')
            {
                $result = Document::getDocument($data->MaBV);
                echo convertDocument($result);
            }
        }

    }
?>