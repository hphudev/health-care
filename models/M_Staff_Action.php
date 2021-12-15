<?php 
    define('locPath', dirname(__DIR__));
    include locPath . '/entities/E_NguoiDung.php';
    include locPath . '/entities/E_ChucVu.php';
    include locPath . '/models/M_Public_Function.php';
    class Staff{
        
        static public function getAllStaff()
        {
            if (!@include(locPath.'/configs/configs.php'))
                include_once(locPath.'/configs/configs.php');
            $sql = "SELECT * FROM nguoidung";
            $result = $conn->query($sql);
            $staffs = array();
            if ($result->num_rows > 0)
            {
                while ($row = $result->fetch_assoc())
                {
                    $nguoiDung = new NguoiDung($row);
                    $staffs[] = $nguoiDung;
                }
            }
            return $staffs;
        }

        static public function getAllRole()
        {
            if (!@include(locPath . '/configs/configs.php'))
                include_once(locPath . '/configs/configs.php');
            $sql = "SELECT * FROM chucvu";
            $result = $conn->query($sql);
            $res = array();
            if ($result->num_rows > 0)
            {
                $i = 0;
                while ($row = $result->fetch_assoc())
                {
                    $chucvu = new ChucVu($row);
                    $res[$i]['MaCV'] = $chucvu->get_MaCV();
                    $res[$i]['TenChucVu'] = $chucvu->get_TenChucVu();
                    $res[$i]['TinhTrang'] = $chucvu->get_TinhTrang();
                    $res[$i]['MacDinh'] = $chucvu->get_MacDinh();
                    $i++;
                }
            }
            return $res;
        }

        static public function getAllRoleInC_Staff()
        {
            if (!@include(locPath . '/configs/configs.php'))
                include_once(locPath . '/configs/configs.php');
            $sql = "SELECT * FROM chucvu";
            $result = $conn->query($sql);
            $res = array();
            if ($result->num_rows > 0)
            {
                $i = 0;
                while ($row = $result->fetch_assoc())
                {
                    $chucvu = new ChucVu($row);
                    $res[$chucvu->get_MaCV()] = $chucvu->get_TenChucVu();
                }
            }
            return $res;
        }

        static public function getStaffWithID($maND)
        {
            if (!@include(locPath.'/configs/configs.php'))
                include_once(locPath.'/configs/configs.php');
            $sql = "SELECT * FROM nguoidung where MaND = '" . $maND ."'";
            $result = $conn->query($sql);
            $staff;
            if ($result->num_rows > 0)
            {
                while ($row = $result->fetch_assoc())
                {
                    $nguoiDung = new NguoiDung($row);
                    $staff = $nguoiDung;
                }
            }
            return $staff;
        }

        static public function deleteStaff($maND)
        {
            if (!@include(locPath.'/configs/configs.php'))
                include_once(locPath.'/configs/configs.php');
            $sql = "DELETE FROM nguoidung where MaND = '" . $maND ."'";
            $result = $conn->query($sql);
            $staff;
            if ($result->num_rows > 0)
            {
                while ($row = $result->fetch_assoc())
                {
                    $nguoiDung = new NguoiDung($row);
                    $staff = $nguoiDung;
                }
            }
            return $staff;
        }

        static public function updateStaff($data)
        {
            if (!@include("../configs/configs.php"))
                include_once("../configs/configs.php");
            if ($data->stateRoleStaff > -1)
                $sql = "UPDATE nguoidung SET HoTen = '" . $data->nameStaff . "', GioiTinh = '" . $data->sexStaff . "', NgaySinh = '" . $data->birthStaff . "', Email = '" . $data->emailStaff . "', MaCV = '" . $data->roleStaff . "', TinhTrang = '" . $data->stateRoleStaff ."' 
                WHERE MaND = '" . $data->idStaff ."'";
            else
                $sql = "UPDATE nguoidung SET HoTen = '" . $data->nameStaff . "', GioiTinh = '" . $data->sexStaff . "', NgaySinh = '" . $data->birthStaff . "', Email = '" . $data->emailStaff . "', MaCV = '" . $data->roleStaff . "' 
                WHERE MaND = '" . $data->idStaff ."'";
            $result = $conn->query($sql);
            return $result;
        }

        static public function updateStateStaff($data)
        {
            if (!@include("../configs/configs.php"))
                include_once("../configs/configs.php");
            $sql = "UPDATE nguoidung SET TinhTrang = '" . $data->state . "' 
            WHERE MaND = '" . $data->maND ."'";
            $result = $conn->query($sql);
            return $result;
        }

        static public function updateStateRole($data)
        {
            if (!@include("../configs/configs.php"))
                include_once("../configs/configs.php");
            $sql = "UPDATE chucvu SET TinhTrang = '" . $data->state . "' 
            WHERE MaCV = '" . $data->maCV ."'";
            $result = $conn->query($sql);
            return $result;
        }

        static public function updateDefaultRole($data)
        {
            if (!@include("../configs/configs.php"))
                include_once("../configs/configs.php");
            if ($data->default == 1)
            {
                $sql = "UPDATE chucvu SET MacDinh = 0";
                $result = $conn->query($sql);
            }
            $sql = "UPDATE chucvu SET MacDinh = '" . $data->default . "' 
            WHERE MaCV = '" . $data->maCV ."'";
            $result = $conn->query($sql);
            return $result;
        }

        static public function updateStateStaffWithRole($data)
        {
            if (!@include("../configs/configs.php"))
                include_once("../configs/configs.php");
            $sql = "UPDATE nguoidung SET TinhTrang = '" . $data->state . "' 
            WHERE MaCV = '" . $data->maCV ."'";
            $result = $conn->query($sql);
            return $result;
        }

        static public function getDetailRole($maCV)
        {
            if (!@include("../configs/configs.php"))
                include_once("../configs/configs.php");
            $sql = "SELECT * FROM phanquyen WHERE MaCV = '" . $maCV ."'"; 
            $result = $conn->query($sql);
            $detailRoles = array();
            if ($result->num_rows > 0)
            {
                $i = 0;
                while ($row = $result->fetch_assoc())
                {
                    $detailRoles[$i]['TenPhanQuyen'] = $row['TenPhanQuyen'];
                    $i++;
                }
            }
            return $detailRoles;
        }

        static public function deleteAllDetailRoleWithRole($maCV)
        {
            if (!@include("../configs/configs.php"))
                include_once("../configs/configs.php");
            $sql = "DELETE FROM phanquyen WHERE MaCV = '" . $maCV ."'"; 
            $result = $conn->query($sql);
            return $result;
        }

        static public function getStateOfRole($maCV)
        {
            if (!@include("../configs/configs.php"))
                include_once("../configs/configs.php");
            $sql = "SELECT * FROM chucvu WHERE MaCV = '" . $maCV ."'"; 
            $result = $conn->query($sql);
            if ($result->num_rows > 0)
            {
                $row = $result->fetch_assoc();
                return $row['TinhTrang'];
            }
            return 0;
        }

        static public function updateDetailRole($data)
        {
            if (!@include("../configs/configs.php"))
                include_once("../configs/configs.php");
            for ($i = 0; $i < count($data->value); $i++)
            {
                $sql = "INSERT INTO phanquyen values ('" . $data->maCV ."', '" . $data->value[$i] . "')"; 
                $result = $conn->query($sql);
            }
            return $result;
        }

        static public function insertRole($data)
        {
            if (!@include("../configs/configs.php"))
                include_once("../configs/configs.php");
            $maCV = PFunction::autoGetIDOnColumnZero("chucvu", "CV");
            $sql = "INSERT INTO chucvu values ('CV" . $maCV ."', '" . $data->tenChucVu . "', 1, 0)"; 
            $result = $conn->query($sql);
            return $result;
        }

    }
?>