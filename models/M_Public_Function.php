<?php
    class PFunction{
        
        static public function autoGetIDOnColumnZero($tableName, $prefix)
        {
            if (!@include("../configs/configs.php"))
                include_once("../configs/configs.php");
            $query = "SELECT * FROM " . $tableName ."";
            $result = $conn->query($query);
            $maxRow = 0;
            if ($result->num_rows > 0)
            {
                while ($row = $result->fetch_array())
                {
                    $array = explode($prefix, $row[0]);
                    $maxRow = max($maxRow, $array[1]);
                }
            }
            return ($maxRow + 1);
        }
    }
?>
