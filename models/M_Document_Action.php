<?php
    include_once "M_Public_Function.php";
    class Document{
        static public function sendDocument($data)
        {
            if (!@include("../configs/configs.php"))
                include_once("../configs/configs.php");
            $maxRow = PFunction::autoGetIDOnColumnZero('baiviet', 'DO');
            // return $maxRow;
            $query = "INSERT INTO baiviet values ('" . ("DO" . $maxRow) . "', '" . $data->title . "', '" . $data->describe ."', '" . $data->content . "', '" . date('Y-m-d') . "', '". $data->TenLBV . "', '" . $data->MaTacGia . "', '" . $data->LuotXem . "', '" . floatval($data->TbSao) . "', '" . floatval($data->TinhTrang) . "')";
            $result = $conn->query($query);
            return $result;
        }

        static public function getDocument($maBV)
        {
            if (!@include('./configs/configs.php'))
                include_once('./configs/configs.php');
            $query = "SELECT * FROM baiviet WHERE MaBV = '". $maBV . "'";
            $result = $conn->query($query);
            return $result;
        }
    }
?>