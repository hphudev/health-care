<?php 
    include_once "M_Public_Function.php";
    class Index{
        static private $salt = "lhp13012001";
        static private $staticSalt = "project_one";

        static public function checkExistAccount($usernameStaff)
        {
            if (!@include("../configs/configs.php"))
                include_once("../configs/configs.php");
            $sql = "SELECT * FROM taikhoan WHERE TenDangNhap = '" . $usernameStaff ."'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0)
                return true;
            else
                if ($result == true)
                    return false;
                else
                    return true;
        }

        static public function deleteStaff($maNGD)
        {
            if (!@include("../configs/configs.php"))
                include_once("../configs/configs.php");
            $sql = "DELETE FROM taikhoan WHERE MaND = '" . $maNGD ."'";
            $result = $conn->query($sql);
            return $result;
        }

        static public function addStaff($data)
        {
            if (!@include("../configs/configs.php"))
                include_once("../configs/configs.php");
            $maNGD = PFunction::autoGetIDOnColumnZero("nguoidung", "NGD");
            $sql = "INSERT INTO nguoidung values ('NGD" . $maNGD ."', '" . $data->nameStaff . "', '" . $data->sexStaff . "', '" . $data->birthStaff ."', '" . $data->emailStaff . "', 'CV2', 1)";
            $result = $conn->query($sql);
            if ($result == true)
            {
                $result = Index::addAccount($maNGD, $data);
                if (!$result)
                    Index::deleteStaff($maNGD);
            }
            return $result;
        }
        
        static public function addAccount($maNGD, $data)
        {
            if (!@include("../configs/configs.php"))
                include_once("../configs/configs.php");
            $encrypt = md5(Index::$staticSalt.$data->passwordStaff.Index::$salt);
            $sql = "INSERT INTO taikhoan values ('" . $data->usernameStaff. "', 'NGD" . $maNGD ."', '" . $encrypt. "', '" . Index::$salt . "', '" . Index::$staticSalt ."')";
            $result = $conn->query($sql);
            return $result;
        }

        static public function checkLogin($data)
        {
            if (!@include("../configs/configs.php"))
                include_once("../configs/configs.php");
            $sql = "SELECT * FROM taikhoan WHERE TenDangNhap = '" . $data->usernameStaff ."'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0)
            {
                $row = $result->fetch_assoc();
                $encrypt = md5($row['StaticSalt'].$data->passwordStaff.$row['Salt']);
                if ($encrypt == $row['MatKhau'])
                    return array('state'=>true, 'MaND'=>$row['MaND']);
                else
                    return array('state'=>false);
            }
            else
                return array('state'=>"not exist");
        }

        

    }
?>