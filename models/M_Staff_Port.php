<?php


include_once "M_Staff_Action.php";

    function convertDatetime($dateTime)
    {
        $time = strtotime($dateTime);
        $date = date('Y-m-d', $time);
        return $date;
    }
    
    function convertStaffToJson($staff)
    {
        return array("MaND"=>$staff->get_MaND(), "HoTen"=>$staff->get_HoTen(), "GioiTinh"=>$staff->get_GioiTinh(), "NgaySinh"=>convertDatetime($staff->get_NgaySinh()), "Email"=>$staff->get_Email(), "MaCV"=>$staff->get_MaCV(), "TinhTrang"=>$staff->get_TinhTrang());
    }

    if (isset($_POST['data']))
    {
        $data = json_decode($_POST['data']);
        if (json_last_error() == JSON_ERROR_NONE)
        {
            if ($data->name == 'getStaffWithID')
            {
                $result = array();
                $staff = Staff::getStaffWithID($data->maND);
                $staff =  convertStaffToJson($staff);
                $roles = Staff::getAllRole();
                $result[] = $staff;
                $result[] = $roles;
                echo json_encode($result);
            }
        }

        if ($data->name == "updateStaff")
        {
            echo Staff::updateStaff($data);
        }

        if($data->name == "updateStateStaff")
        {
            if (Staff::getStateOfRole($data->maCV) == 1)
                echo Staff::updateStateStaff($data);
            else
                echo 0;
        }

        if ($data->name == "updateStateRole")
        {
            echo Staff::updateStateRole($data);
        }

        if ($data->name == "updateStateStaffWithRole")
        {
            echo Staff::updateStateStaffWithRole($data);
        }

        if ($data->name == "getDetailRole")
        {
            echo json_encode(Staff::getDetailRole($data->maCV));
        }

        if ($data->name == "updateDetailRole")
        {
            Staff::updateDefaultRole($data);
            Staff::deleteAllDetailRoleWithRole($data->maCV);
            if (count($data->value) > 0)
                echo Staff::updateDetailRole($data);
            else
                echo 1;
        }

        if ($data->name == "insertRole")
        {
            echo Staff::insertRole($data);
        }
    }
?>