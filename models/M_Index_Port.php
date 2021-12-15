<?php
    include_once "M_Index_Action.php";

    if (isset($_POST['data']))
    {
        $data = json_decode($_POST['data']);
        if (json_last_error() == JSON_ERROR_NONE)
        {
            if ($data->name == "addStaff")
            {
                $result = Index::checkExistAccount($data->usernameStaff);
                if ($result == false)
                {
                    echo strval(Index::addStaff($data));
                }
                else
                    echo "exist";
            }

            

            if ($data->name == "checkLogin")
            {
                echo json_encode(Index::checkLogin($data));
            }

            if ($data->name == "updateSessionIDUser")
            {
                if (session_status() === PHP_SESSION_NONE) 
                    session_start();
                $_SESSION['IDUser'] = strval($data->IDUser);
                echo $_SESSION['IDUser'];
            }

            if ($data->name == "unsetSessionIDUser")
            {
                if (session_status() === PHP_SESSION_NONE) 
                    session_start();
                if (isset($_SESSION['IDUser']))
                    unset($_SESSION['IDUser']);
                echo true;
            }

            if ($data->name == "updateSession")
            {
                if (session_status() === PHP_SESSION_NONE) 
                    session_start();
                $_SESSION[$data->id] = strval($data->value);
                echo $_SESSION[$data->id];
            }

            if ($data->name == "unsetSession")
            {
                if (session_status() === PHP_SESSION_NONE) 
                    session_start();
                if (isset($_SESSION['IDUser']))
                    unset($_SESSION['IDUser']);
                echo true;
            }
        }
    }
?>